<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminEmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employee')
            ->select('employee.*', 'job_categories.occupation as job_name')
            ->leftJoin('job_categories', 'employee.job_categories_id', '=', 'job_categories.id')
            ->orderBy('created_at', 'DESC')
            ->paginate(1);
        return view('admin.pages.employee-list.list', ['employees' => $employees]);
    }
    public function create()
    {
        $jobCategories = DB::table('job_categories')->get();
        return view(
            'admin.pages.employee-list.create',
            ['jobCategories' => $jobCategories]
        );
    }
    public function store(StoreEmployeeRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $fileOrginialName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('images'),  $fileName);
        }
        $bool = DB::table('employee')->insert([
            'avatar' => $fileName ?? null,
            'name' => $request->name,
            'slug' => $request->slug,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'job_categories_id' => $request->occupation,
            'description' => $request->description,
            // 'password' => Hash::make($request->password),
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7)
        ]);
        $message = $bool ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.employee-list.index')->with('message', $message);
    }
    public function show($id)
    {
        $jobCategories = DB::table('job_categories')->get();
        // dd($jobCategories->id);
        $employees = DB::table('employee')->find($id);
        return view('admin.pages.employee-list.detail', ['employees' => $employees, 'jobCategories' => $jobCategories]);
    }
    public function update(UpdateEmployeeRequest $request, $id)
    {

        $employee = DB::table('employee')->find($id);
        $oldImageFileName = $employee->avatar;
        if ($request->hasFile('avatar')) {
            $fileOrginialName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('images'),  $fileName);
            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }
        $check = DB::table('employee')->where('id', $id)->update(
            [
                'avatar' => $fileName ?? $oldImageFileName,
                'name' => $request->name,
                'slug' => $request->slug,
                'email' => $request->email,
                'age' => $request->age,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'job_categories_id' => $request->occupation,
                'updated_at' => Carbon::now(+7)
            ]
        );
        $message = $check > 0 ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.employee-list.index')->with('message', $message);
    }
    public function destroy($id)
    {
        $check = DB::table('employee')->where('id', $id)->delete();
        $message = $check > 0 ? 'Successfully deleted employee' : 'Failed to deleted employee';
        return redirect()->route('admin.employee-list.index')->with('message', $message);
    }
    public function createSlug(Request $request)
    {
        return response()->json(['slug' => Str::slug($request->name, '-')]);
    }
    public function uploadImage(Request $request)
    {

        dd($request->all());
        if ($request->hasFile('upload')) {
            $fileOrginialName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('upload')->getClientOriginalExtension();
            $request->file('upload')->move(public_path('images'),  $fileName);

            $url = asset('images/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
