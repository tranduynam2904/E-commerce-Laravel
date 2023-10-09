<?php

namespace App\Http\Controllers\Login;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
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

        if ($findUser) {
            // If user exist, login user
            $findUser->update([
                'email_verified_at' => Carbon::now(+7)
            ]);
            Auth::login($findUser);
            return redirect()->route('home.index');
        }

        // If user don't exist, create new user
        try {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'email_verified_at' => Carbon::now(+7),
                'password' => Hash::make('123456dummy')
            ]);
            Auth::login($newUser);

            return redirect()->route('home.index');
        } catch (\Exception $e) {
            // if something wrong, redirect with error message
            return redirect('/error')->with('error', 'cannot create account');
        }
    }
}
