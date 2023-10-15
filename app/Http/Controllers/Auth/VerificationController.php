<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        $user = User::find($id);

        if (!$user || !hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->route('home')->with('message', 'Your email has been verified!');
    }
    public function verifyEmail(Request $request)
    {
        dd($request->user()->email_verified_at);

        // = Carbon::now(+7);
        return Redirect::route('login')->with('message','Verified email successfully');
    }
}
