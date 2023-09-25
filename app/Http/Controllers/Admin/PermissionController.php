<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::select()->paginate(5);
        return view('admin.pages.permissions.list', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $check = DB::table('permissions')->insert([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7)
        ]);
        $message = $check ? 'Created permission successfully' : 'Failed to create permission';
        return redirect()->route('admin.permissions.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permissions = DB::table('permissions')->find($id);
        // dd($permissions);
        return view('admin.pages.permission.detail', ['permissions' => $permissions]);
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
    public function update(Request $request, string $id)
    {
        // $check = DB::table('')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
