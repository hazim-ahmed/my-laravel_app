<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::with('employee')
            ->orderBy('pay_date', 'desc')
            ->get();

        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::orderBy('last_name')->get();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount'      => 'required|numeric|min:0',
            'pay_date'    => 'required|date',
            'notes'       => 'nullable|string',
        ]);

        Salary::create($data);

        return redirect()
            ->route('salaries.index')
            ->with('success', 'تم إضافة قيد الراتب بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        $salary->load('employee');
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::orderBy('last_name')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount'      => 'required|numeric|min:0',
            'pay_date'    => 'required|date',
            'notes'       => 'nullable|string',
        ]);

        $salary->update($data);

        return redirect()
            ->route('salaries.index')
            ->with('success', 'تم تحديث قيد الراتب بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()
            ->route('salaries.index')
            ->with('success', 'تم حذف قيد الراتب بنجاح.');
    }
}
