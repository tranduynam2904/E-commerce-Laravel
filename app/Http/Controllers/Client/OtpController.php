<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function index()
    {
        $users = User::latest()->first();
        // dd($users);
        return view('auth.otp', ['users' => $users]);
    }



    // public function updatePhoneUser(Request $request, User $user)
    // {
    //     // dd($request->all());
    //     $user->phone = $request->phone;
    //     $message = $user ? 'Updated phone successfully' : 'Failed to update phone';
    //     return redirect()->route('user.phone-update')->with('message', $message);
    // }
};
