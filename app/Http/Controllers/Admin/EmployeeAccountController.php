<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class EmployeeAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('name', 'client')->first();

        //Use laravel spatie role/permission method whereHas to point out the table
        $employees = User::whereHas(
            'roles',
            function ($query) use ($role) {
                $query->where('id', $role->id);
            }
        )->paginate(5);

        return view('admin.pages.employee-account.list', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.employee-account.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee_account = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7),
            'password' => Hash::make('admin23'),
        ])->assignRole('writer', 'employee');
        $message = $employee_account ? 'Created employee successfully' : 'Failed to create employee';
        return Redirect::route('admin.employee-account.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $employee_account)
    {
        return view('admin.pages.employee-account.detail', ['employee_account' => $employee_account]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $employee_account)
    {
        $employee_account->name = $request->name;
        $employee_account->email = $request->email;
        $employee_account->updated_at = Carbon::now(+7);
        $check = $employee_account->save();
        $message = $check ? 'Updated employee account successfully' : 'Failed to update employee account';
        return Redirect::route('admin.employee-account.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee_account)
    {
        $check = $employee_account->delete();
        $message = $check ? 'Deleted employee account successfully' : 'Failed to delete employee account';
        return Redirect::route('admin.employee-account.index')->with('message', $message);
    }
}
