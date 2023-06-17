<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\VendorInfoRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorController extends UserController
{
    /**
     * To handle the request of updating info of a vendor
     * @param VendorInfoRequest $request
     */
    public function updateInfo(VendorInfoRequest $request){
        // validation
        $data = $request->validated();

        // preparing some needed data
        $userId = Auth::id();
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address']
        ];

        $shopData = [
            'shop_description' => $data['shop_description'],
            'shop_name' => $data['shop_name']
        ];

        $vendor_id = DB::table('vendor_shop')
            ->where('user_id', '=', $userId)
            ->get(['vendor_id'])[0];


        if ($this->updateUserData($userId, $userData) && $this->updateShopData((int)$vendor_id->vendor_id, $shopData))
            return response(['msg' => "Your Info is updated successfully"], 200);
        else{
            toastr()->error('Failed to save changes, try again.');
            return redirect()->route('vendor-profile');
        }

    }

    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    private function updateUserData(int $userId, Array $data): bool{
        return User::findOrFail($userId)->update($data);
    }

    /**
     * @param int $vendorId
     * @param array $data
     * @return bool
     */
    private function updateShopData(int $vendorId, Array $data): bool{
        return DB::table('vendor_shop')->where('vendor_id', '=', $vendorId)->update($data);
    }

    /**
     * @param int $userId
     * To return the id of the current user's shop
     */
    public static function getVendorId(int $userId){
        return DB::table('vendor_shop')->where('user_id', $userId)
            ->select('vendor_id')->value('vendor_id');
    }

}
