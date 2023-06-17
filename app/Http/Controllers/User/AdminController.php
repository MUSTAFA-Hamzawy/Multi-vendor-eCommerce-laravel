<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\AdminInfoRequest;
use App\Models\User;
use App\MyHelpers;
use App\Notifications\VendorActivated;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends UserController
{
    /**
     * Update the info of the admin
     * @param AdminInfoRequest $request
     */
    public function updateInfo(AdminInfoRequest $request){
        // validation
        $data = $request->validated();

        // update info in db
        $userId = Auth::id();
        try {
            if(User::findOrFail($userId)->update($data))
                return response(['msg' => "Your Info is updated successfully"], 200);
        }catch (ModelNotFoundException $exception){
            toastr()->error('Failed to save changes, try again.');
            return redirect()->route('admin-profile');
        }
    }

    public function userRemove(Request $request){
        try {
            $user = User::findOrFail($request->id);
            MyHelpers::deleteImageFromStorage($user->photo , 'uploads/images/profile/');
            if ($user->delete())
                return redirect()->route('admin-vendor-list')->with('success', 'Successfully removed.');
            else
                return redirect('admin-vendor-list')->with('error', 'Failed to remove this user.');
        }catch (ModelNotFoundException $exception){
            return redirect('admin-vendor-list')->with('error', 'Failed to remove this user.');
        }
    }

    public function vendorActivate(Request $request){
        $vendor_id = $request->vendor_id;

        // check whether activate or de-activate
        if ($request->current_status == "1"){
            return $this->vendorDeActivate($vendor_id);
        }

        try {
            $vendor = User::findOrFail($vendor_id);
            $vendor->update(['status' => 1]);

            // notify the vendor
            Notification::send($vendor, new VendorActivated());

            return response(['msg' => 'Vendor now is activated.'], 200);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('admin-vendor-list')->with('error', 'Failed to activate this vendor, try again');
        }
    }
    public function vendorDeActivate(int $vendor_id){

        try {
            User::findOrFail($vendor_id)->update(['status' => 0]);
            return response(['msg' => 'Vendor now is disabled.'], 200);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('admin-vendor-list')->with('error', 'Failed to activate this vendor, try again');
        }
    }

}
