<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $roles = Role::select()->paginate(5);

        // $adminRole = Role::findByName('admin');
        // $permission = Permission::findByName('look-dashboard');
        // $adminRole->givePermissionTo($permission);
        return view('admin.pages.role.list', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->guard_name);
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7)
        ]);
        $message = $role ? 'Created role successfully' : 'Failed to create role';
        return Redirect::route('admin.role.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        // $rolesWithPermissions = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.pages.role.detail', [
            'role' => $role,
            'permissions' => $permissions
        ]);
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
    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->updated_at = Carbon::now(+7);
        $check = $role->save();
        $message = $check ? 'Updated role successfully' : 'Failed to update role';
        return Redirect::route('admin.role.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $check = $role->delete();
        $message = $check ? 'Deleted role successfully' : 'Failed to delete role';
        return Redirect::route('admin.role.index')->with('message', $message);
    }
    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Role already has this permission');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission has been added to role');
    }
    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission->name)) {
            $role->revokePermissionTo($permission->name);
            return back()->with('message', 'Permission has been removed from role');
        }
        return back()->with('message', 'Permission not exists.');
    }
}
