<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RegisteredNewVendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Exception;
use App\Http\Controllers\Auth\RegisteredUserController;

class SocialiteController extends Controller
{
    /**
     * Redirecting to google
     */
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    /**
     * Logic function for Google callback
     */
    public function googleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            $oldUser = User::where('social_id', $user->id)->first();

            // if the user is already registered, then login
            if ($oldUser){
                Auth::login($oldUser);
                return redirect()->route($oldUser->role . '-profile');
            }
            // otherwise, create a new user
            else{
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => isset($user->username) ? $user->username : $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->password),
                    'role' => isset($user->role) ? $user->role : 'vendor',
                    'social_type' => 'google',
                    'social_id' => $user->id,
                ]);

                RegisteredUserController::completeVendorRegistration($newUser);
                event(new Registered($newUser));

                Auth::login($newUser);

                // notify the admin
                $admins = User::where('role', 'admin')->get();
                Notification::send($admins, new RegisteredNewVendor());

                return redirect()->route('vendor-profile');
            }


        } catch (Exception $e){
            return redirect('coupon')->with('error', 'Something went wrong, try again.');
        }
    }

}
