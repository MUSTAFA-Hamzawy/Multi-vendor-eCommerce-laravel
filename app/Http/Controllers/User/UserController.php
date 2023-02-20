<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\User;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    /**
     * To update the image of an authenticated user ( admin, vendor, or any user )
     * @param Request $request
     */
    public function updateImage(Request $request){

        $image = $request->file('image');
        if ($image)
        {
            // validate the new image
            $allowedExtensions = 'gif,jpg,jpeg,png,svg,webp,ico';
            $data = $request->validate([
                    'image' => ['nullable', 'image', 'mimes:' . $allowedExtensions, 'max:4096']
                ],
                [
                    'image.image' => 'The file must be an image.'
                ]
            );

            // upload it
            $data['photo'] = MyHelpers::uploadImage($image, 'uploads/images/profile');

            // update image in db
            try {
                $user = User::findOrFail(Auth::id())->update($data);
                if ($user){
                    // remove the old image
                    MyHelpers::deleteImageFromStorage(Auth::user()->photo, 'uploads/images/profile/');
                    return response(['msg' => 'Your image is updated successfully'],200);
                }
            }catch (ModelNotFoundException $exception){
                toastr()->error('failed to update the new image');
                return redirect()->back();
            }
        }
    }

    /**
     * To update the password of any user.
     * @param Request $request
     */
    public function updatePassword(Request $request){
        // validation
        $rules = [
            'password' => ['required', 'current_password'],
            'new_password' => ['required', Password::defaults(), 'different:password'],
            'confirm_password' => ['required', 'same:new_password']
        ];
        $data = $request->validate($rules);


        // updating the password
        User::find(Auth::id())->update([
            'password' => Hash::make($data['new_password'])
        ]);
        return response(['msg' => 'Updated Successfully'], 200);
    }



}
