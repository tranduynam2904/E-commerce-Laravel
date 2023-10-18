<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientAccountRequest;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClientAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('name', 'client')->first();

        //Use laravel spatie role/permission method whereHas to point out the table
        $clients = User::whereHas(
            'roles',
            function ($query) use ($role) {
                $query->where('id', $role->id);
            }
        )->paginate(5);
        return view('admin.pages.client-account.list', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.client-account.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    // }

    /**
     * Display the specified resource.
     */
    public function show(User $client_account)
    {
        $roles = Role::all();
        return view('admin.pages.client-account.detail', ['client_account' => $client_account, 'roles' => $roles]);
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
    public function update(ClientAccountRequest $request, User $client_account)
    {
        $client_account->name = $request->name;
        $client_account->email = $request->email;
        $client_account->updated_at = Carbon::now(+7);
        $check = $client_account->save();
        //Override all role by empty array
        $client_account->syncRoles([]);
        $client_account->assignRole($request->role);
        $message = $check ? 'Updated client account successfully' : 'Failed to update client account';
        return Redirect::route('admin.client-account.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $client_account)
    {
        $check = $client_account->delete();
        $message = $check ? 'Deleted client account successfully' : 'Failed to delete client account';
        return Redirect::route('admin.client-account.index')->with('message', $message);
    }
}
