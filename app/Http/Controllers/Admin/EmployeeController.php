<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $token = csrf_token();
        $employees = DB::select('select * from employee');
        return view('admin.pages.employee-list.list', ['employees' => $employees, 'form' => compact('token')]);
    }
    public function create()
    {
        $random = Str::random(8);
        return view('admin.pages.employee-list.create', ['random' => $random]);
    }
    public function store(StoreEmployeeRequest $request)
    {
        // dd($request->cancel);
        $bool = DB::insert('INSERT INTO `employee`( name, email, age, gender, phone, occupation, password, created_at, updated_at)
        VALUES (?,?,?,?,?,?,?,?,?)', [
            $request->name,
            $request->email,
            $request->age,
            $request->gender,
            $request->phone,
            $request->occupation,
            Hash::make($request->password),
            Carbon::now(+7),
            Carbon::now(+7)
        ]);
        $message = $bool ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.employee-list')->with('message', $message);
    }
    public function detail($id)
    {
        $details = DB::select('select * from employee where id = ?', [$id]);
        return view('admin.pages.employee-list.detail', ['details' => $details]);
    }
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $check = DB::update("UPDATE `employee` SET
        name = ?,
        email = ?,
        age = ?,
        gender = ?,
        phone = ?,
        occupation = ?,
        password = ?,
        repeat_password = ?,
        updated_at = ?
        WHERE id = ?", [
            $request->name,
            $request->email,
            $request->age,
            $request->gender,
            $request->phone,
            $request->occupation,
            Hash::make($request->password),
            Hash::make($request->repeat_password),
            Carbon::now(+7),
            $id
        ]);
        $message = $check > 0 ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.employee-list')->with('message', $message);
    }
    public function delete($id)
    {
        $check = DB::delete('delete from `employee` where id = ?', [$id]);
        $message = $check > 0 ? 'Successfully deleted employee' : 'Failed to deleted employee';
        return redirect()->route('admin.employee-list')->with('message', $message);
    }
    // public function randomPassword()
    // {
    //     $random = Str::random(8);
    //     return view('admin.pages.employee-list.create', ['random' => $random]);
    // }
}
