<?php

namespace App\Http\Controllers;

use App\Events\UpdatePhoneEvent;
use App\Http\Requests\ConfirmPasswordRequest;
use App\Http\Requests\OtpRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdatePhoneRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Twilio\Rest\Client;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        return view('client.pages.profile', ['user' => $user]);
    }
    public function updateProfile(Request $request, User $user)
    {
        // $currentName= Auth::user()->password;
        // $newName = $request->name;

        $newName = $request->user()->name = $request->name;
        $newName = $request->user()->save();
        $message = $newName ? 'Updated profile successfully' : 'Failed to update profile';
        return Redirect::route('profile.edit')->with('message', $message);
    }
    public function phoneUpdateIndex()
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        return view('auth.update-phone', ['user' => $user]);
    }
    /**
     * Update the user's profile information.
     */
    public function updatePhone(UpdatePhoneRequest $request): RedirectResponse
    {
        event(new UpdatePhoneEvent($request));
        if ($request->phone == Auth::user()->phone) {
            return Redirect::route('profile.edit')->with('message', 'Nothing to update');
        }
        return Redirect::route('profile.phone.verifyOtp');
    }
    public function verifyOtp(OtpRequest $request)
    {
        $updateRequest = session()->get('update_request');
        $user = $updateRequest;
        try {
            // Call the value in session
            if (session('otp') == $request->otp) {
                $request->user()->phone = $user['phone'];
                $check = $request->user()->save();
                $message = $check ? 'Updated phone successfully' : 'Failed to update phone';
                return Redirect::route('profile.edit')->with('message', $message);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return view('auth.update-phone-otp', ['user' => $user]);
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }

    public function verifyOption()
    {
        return view('auth.verify-option');
    }
    public function verifyPassword()
    {
        if (Hash::check('123456dummy', Auth::user()->password)) {
            return Redirect::route('profile.new-password');
        }
        return view('auth.verify-password');
    }
    public function verifyPasswordStore(Request $request)
    {
        if (Auth::check() && Hash::check("$request->current_password", Auth::user()->password)) {
            return Redirect::route('profile.new-password');
        }
        return Redirect::route('profile.verify-password')->with('message', 'Wrong Password');
    }
    public function newPassword()
    {
        return view('auth.new-password');
    }
    public function newPasswordStore(ConfirmPasswordRequest $request)
    {
        $currentPassword = Auth::user()->password;
        $newPassword = $request->new_password;

        if (Hash::check($newPassword, $currentPassword)) {
            // If new password = old password Redirect to profile
            return Redirect::route('profile.edit')->with('message', 'Nothing change');
        } else {
            // Update new password
            $request->user()->password = Hash::make($newPassword);
            $request->user()->save();
        }
        return Redirect::route('profile.edit')->with('message', 'Change Password Successfully');
    }
}
