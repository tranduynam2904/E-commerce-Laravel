<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.pages.login.content');
    }
    public function login(LoginRequest $request)
    {
        // Get the credentials from the request
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // Get the authenticated employee
            $employee = Auth::guard('web')->user();
            // Login the employee using the employee guard
            Auth::guard('web')->login($employee);
            // Redirect the employee to the dashboard or other page
            return redirect()->route('admin.dashboard');
        } else {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}
