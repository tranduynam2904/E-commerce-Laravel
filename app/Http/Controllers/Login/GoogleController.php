<?php

namespace App\Http\Controllers\Login;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        // Start Google OAuth
        $user = Socialite::driver('google')->user();

        // Find User in database
        $findUser = User::where('google_id', $user->id)->first();
        // dd($findUser->email_verified_at);
        if ($findUser) {
            if ($findUser->email_verified_at !== null) {
                // If user verified email, login user
                Auth::login($findUser);
            } else {
                Auth::logout($findUser);
            }
            return redirect()->route('home.index');
        }

        // If user don't exist, create new user
        try {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make('123456dummy')
            ]);
            $newUser->sendEmailVerificationNotification();
            // Send Email Verification
            if ($newUser->hasVerifiedEmail()) {
                $newUser->markEmailAsVerified();
                $newUser->save();
                Auth::login($newUser);
            }
            // else {
            //     Auth::logout($newUser);
            // }
            return redirect()->route('home.index');
        } catch (\Exception $e) {
            // if something wrong, redirect with error message
            return redirect('/error')->with('error', 'cannot create account');
        }
    }
}
