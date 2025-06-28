<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobTitles = JobTitle::orderBy('name')->get();
        return view('job_titles.index', compact('jobTitles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job_titles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:job_titles,name',
            'description' => 'nullable|string',
        ]);

        JobTitle::create($data);

        return redirect()
            ->route('job_titles.index')
            ->with('success', 'تم إنشاء مسمى الوظيفة بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobTitle $jobTitle)
    {
        // يمكنك جلب الموظفين المرتبطين إذا أردت:
        // $jobTitle->load('employees');
        return view('job_titles.show', compact('jobTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobTitle $jobTitle)
    {
        return view('job_titles.edit', compact('jobTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobTitle $jobTitle)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:job_titles,name,' . $jobTitle->id,
            'description' => 'nullable|string',
        ]);

        $jobTitle->update($data);

        return redirect()
            ->route('job_titles.index')
            ->with('success', 'تم تحديث مسمى الوظيفة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobTitle $jobTitle)
    {
        // يمكنك منع الحذف إذا كان مرتبطًا بموظفين:
        // if ($jobTitle->employees()->count()) {
        //     return back()->withErrors('لا يمكن حذف مسمى وظيفة يحتوي على موظفين.');
        // }

        $jobTitle->delete();

        return redirect()
            ->route('job_titles.index')
            ->with('success', 'تم حذف مسمى الوظيفة بنجاح.');
    }
}
