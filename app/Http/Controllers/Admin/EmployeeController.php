<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.pages.employee-list.list');
    }
    public function create()
    {
        return view('admin.pages.employee-list.create');
    }
    public function store(Request $request)
    {
        // $this->attributes['password'] = Crypt::encrypt($request);
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'occupation' => 'required',
            'password' => 'required',
            'repeat_password' => 'required',
            'phone' => 'required',
        ]);
        $bool = DB::insert('INSERT INTO `employee`( name, email, age, gender, phone, occupation, password, repeat_password, created_at, updated_at)
        VALUES (?,?,?,?,?,?,?,?,?,?)', [
            $request->name,
            $request->email,
            $request->age,
            $request->gender,
            $request->phone,
            $request->occupation,
            $request->password,
            $request->repeat_password,
            Carbon::now(+7),
            Carbon::now(+7)
        ]);
        $message = $bool ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.pages.employee-list.list')->with('message', $message);
        // dd($request->all());
        // dd(1);
    }
}
