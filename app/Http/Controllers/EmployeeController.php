<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['jobTitle', 'department'])
            ->orderBy('last_name')
            ->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobTitles   = JobTitle::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();

        return view('employees.create', compact('jobTitles', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'phone'         => 'nullable|string|max:20',
            'job_title_id'  => 'required|exists:job_titles,id',
            'department_id' => 'required|exists:departments,id',
            'hired_at'      => 'required|date',
        ]);

        Employee::create($data);

        return redirect()
            ->route('employees.index')
            ->with('success', 'تم إضافة الموظف بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['jobTitle', 'department', 'leaves', 'salaries', 'attendances']);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $jobTitles   = JobTitle::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();

        return view('employees.edit', compact('employee', 'jobTitles', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email,' . $employee->id,
            'phone'         => 'nullable|string|max:20',
            'job_title_id'  => 'required|exists:job_titles,id',
            'department_id' => 'required|exists:departments,id',
            'hired_at'      => 'required|date',
        ]);

        $employee->update($data);

        return redirect()
            ->route('employees.index')
            ->with('success', 'تم تحديث بيانات الموظف بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // يمكنك التحقق من أي قيود قبل الحذف، مثل وجود سجلات مرتبطة:
        // if ($employee->attendances()->count()) { ... }

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'تم حذف الموظف بنجاح.');
    }
}
