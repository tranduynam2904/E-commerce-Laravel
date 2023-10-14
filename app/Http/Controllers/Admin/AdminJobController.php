<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobCategoriesRequest;
use App\Models\JobCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobCategories = JobCategory::all();
        return view('admin.pages.job-category.list', ['jobCategories' => $jobCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.pages.job-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobCategoriesRequest $request)
    {
        $jobCategories = new JobCategory;
        $jobCategories->occupation = $request->occupation;
        $jobCategories->required_age = $request->required_age;
        $jobCategories->salary_range = $request->salary_range;
        $jobCategories->number_of_recruits = $request->number_of_recruits;
        $jobCategories->recruitment_status = $request->recruitment_status;
        $jobCategories->created_at = Carbon::now(+7);
        $jobCategories->updated_at = Carbon::now(+7);
        $check = $jobCategories->save();
        $message = $check ? 'Created job categories successfully ' : 'Failed to create job categories';
        return Redirect::route('admin.job-category.index')->with('message', $message);
        // return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobCategory $jobCategory)
    {

        // $jobCategories = DB::table('job_categories')->find($id);
        return view('admin.pages.job-category.detail', ['jobCategory' => $jobCategory]);
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
    public function update(Request $request, JobCategory $jobCategory)
    {
        $jobCategory->occupation = $request->occupation;
        $jobCategory->required_age = $request->required_age;
        $jobCategory->salary_range = $request->salary_range;
        $jobCategory->number_of_recruits = $request->number_of_recruits;
        $jobCategory->recruitment_status = $request->recruitment_status;
        $jobCategory->updated_at = Carbon::now(+7);
        $check = $jobCategory->save();
        $message = $check ? 'Created employee Successfully' : 'Failed to create employee';
        return Redirect::route('admin.job-category.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $jobCategory)
    {
        $check = $jobCategory->delete();
        $message = $check ? 'Deleted job category successfully' : 'Failed to Job category  delete';
        return Redirect::route('admin.job-category.index')->with('message', $message);
    }
}
