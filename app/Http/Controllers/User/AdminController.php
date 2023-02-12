<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\AdminInfoRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

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

}
