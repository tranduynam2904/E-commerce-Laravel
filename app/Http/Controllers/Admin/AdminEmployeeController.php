<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\JobCategory;
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
        $employeeList = Employee::select()
            ->orderBy('created_at', 'DESC')
            ->paginate(1);
        return view('admin.pages.employee-list.list', ['employeeList' => $employeeList]);
    }
    public function create()
    {
        $jobCategories = JobCategory::all();
        return view(
            'admin.pages.employee-list.create',
            ['jobCategories' => $jobCategories]
        );
    }
    public function store(StoreEmployeeRequest $request)
    {
        // dd($request->all());
        if ($request->hasFile('avatar')) {
            $fileOrginialName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('images'),  $fileName);
        }
        //Eloquent
        $employeeList = new Employee;
        $employeeList->avatar = $fileName ?? null;
        $employeeList->name = $request->name;
        $employeeList->slug = $request->slug;
        $employeeList->email = $request->email;
        $employeeList->age = $request->age;
        $employeeList->gender = $request->gender;
        $employeeList->phone = $request->phone;
        $employeeList->job_category_id = $request->occupation;
        $employeeList->description = $request->description;
        $employeeList->created_at = Carbon::now(+7);
        $employeeList->updated_at = Carbon::now(+7);
        $check = $employeeList->save();
        // $check = DB::table('employees')->insert([
        //     'name' => $request->name,
        // ]);

        $message = $check ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.employee-list.index')->with('message', $message);
    }
    public function show(Employee $employeeList)
    {
        // dd($employee_list->id);
        $jobCategories = JobCategory::all();
        // dd($jobCategories->id);
        // $employees = DB::table('employee')->find($id);
        return view('admin.pages.employee-list.detail', ['employees' => $employeeList, 'jobCategories' => $jobCategories]);
    }
    public function update(UpdateEmployeeRequest $request, Employee $employeeList)
    {
        // dd($employees->all());
        $oldImageFileName = $employeeList->avatar;
        if ($request->hasFile('avatar')) {
            $fileOrginialName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('images'),  $fileName);
            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }
        $employeeList->avatar = $fileName ?? $oldImageFileName;
        $employeeList->name = $request->name;
        $employeeList->slug = $request->slug;
        $employeeList->email = $request->email;
        $employeeList->age = $request->age;
        $employeeList->gender = $request->gender;
        $employeeList->phone = $request->phone;
        $employeeList->job_category_id = $request->occupation;
        $employeeList->updated_at = Carbon::now(+7);
        $check = $employeeList->save();
        $message = $check > 0 ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.employee-list.index')->with('message', $message);
    }
    public function destroy(Employee $employeeList)
    {
        // $check = DB::table('employee')->where('id', $id)->delete();
        $check = $employeeList->delete();
        $message = $check > 0 ? 'Successfully deleted employee' : 'Failed to deleted employee';
        return redirect()->route('admin.employee-list.index')->with('message', $message);
    }
    public function createSlug(Request $request)
    {
        return response()->json(['slug' => Str::slug($request->name, '-')]);
    }
    public function uploadImage(Request $request)
    {
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
