<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobCategoriesRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobCategories = DB::table('job_categories')->get();
        return view('admin.pages.job-categories.list', ['jobCategories' => $jobCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.pages.job-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobCategoriesRequest $request)
    {

        $check = DB::table('job_categories')->insert(
            [
                'occupation' =>
                $request->occupation,
                'required_age' => $request->required_age,
                'salary_range' => $request->salary_range,
                'number_of_recruits' => $request->number_of_recruits,
                'recruitment_status' => $request->recruitment_status,
                'created_at' => Carbon::now(+7),
                'updated_at' => Carbon::now(+7)
            ]
        );
        $message = $check ? 'Successfully created job categories' : 'Failed created job categories';
        return redirect()->route('admin.job-categories.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $jobCategories = DB::table('job_categories')->find($id);
        return view('admin.pages.job-categories.detail', ['jobCategories' => $jobCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $check = DB::table('job_categories')->where('id', $id)->update(
            [
                'occupation' => $request->occupation,
                'required_age' => $request->required_age,
                'salary_range' => $request->salary_range,
                'number_of_recruits' => $request->number_of_recruits,
                'recruitment_status' => $request->recruitment_status,
                'updated_at' => Carbon::now(+7)
            ]
        );
        $message = $check ? 'Successfully created employee' : 'Failed to create employee';
        return redirect()->route('admin.job-categories.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = DB::table('job_categories')->delete($id);
        $message = $check ? 'Job categories deleted successfully' : 'Job categories failed to delete';
        return redirect()->route('admin.job-categories.index')->with('message', $message);
    }
}
