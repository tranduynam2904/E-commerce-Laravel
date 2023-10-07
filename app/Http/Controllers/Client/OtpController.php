<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function index()
    {
        $users = User::latest()->first();
        // dd($users);
        return view('auth.otp', ['users' => $users]);
    }
    public function store()
    {
    }
}
