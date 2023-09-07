<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.pages.login.content');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Get the credentials from the request
        $credentials = $request->only('email', 'password');
        if (Auth::guard('employee')->attempt($credentials)) {
            // Get the authenticated employee
            $employee = Auth::guard('employee')->user();

            // Login the employee using the employee guard
            Auth::guard('employee')->login($employee);

            // Redirect the employee to the dashboard or other page
            return redirect()->intended('dashboard');
        } else {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}
