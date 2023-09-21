<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.pages.login.content');
    }
    public function login(LoginRequest $request)
    {
        // Get the credentials from the request
        $credentials = $request->only('email', 'password');
        // dd(Auth::guard('web')->attempt($credentials));
        if (Auth::guard('web')->attempt($credentials)) {
            // Get the authenticated employee
            $users = Auth::guard('web')->user()->name;
            // Login the employee using the employee guard
            // Auth::guard('web')->login($users);
            if ($users === 'admin') {
                // Redirect the employee to the dashboard or other page
                return redirect()->route('admin.dashboard');
            } else if ($users === 'employee') {
                return redirect()->route('FTM.employee.dashboard');
            }
        } else {
            // Redirect back with an error message
            return redirect()->route('FTM.login')->with('error', 'Invalid credentials');
        }
    }
}
