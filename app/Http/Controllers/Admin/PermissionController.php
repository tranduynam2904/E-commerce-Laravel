<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(5);
        return view('admin.pages.permissions.list', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $check = DB::table('permissions')->insert([
        //     'name' => $request->name,
        //     'guard_name' => $request->guard_name,
        //     'created_at' => Carbon::now(+7),
        //     'updated_at' => Carbon::now(+7)
        // ]);

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7)
        ]);
        $message = $permission ? 'Created permission successfully' : 'Failed to create permission';
        return Redirect::route('admin.permissions.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        // $permissions = DB::table('permissions')->find($id);
        // dd($permissions);
        return view('admin.pages.permissions.detail', ['permission' => $permission]);
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
    public function update(Request $request, Permission $permission)
    {
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->created_at = Carbon::now(+7);
        $check = $permission->save();
        $message = $check ? 'Updated permission successfully' : 'Failed to update permission';
        return Redirect::route('admin.permissions.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $check = $permission->delete();
        $message = $check ? 'Deleted permission successfully' : 'Failed to delete permission';
        return Redirect::route('admin.permissions.index')->with('message', $message);
    }
}
