<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::with('employee')
            ->orderBy('start_date', 'desc')
            ->get();

        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::orderBy('last_name')->get();
        // يمكنك تعريف أنواع الإجازات والحالات هنا إن أردت
        // $types = ['annual', 'sick', 'maternity', ...];
        // $statuses = ['pending', 'approved', 'rejected'];

        return view('leaves.create', compact('employees' /*, 'types', 'statuses'*/));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'type'        => 'required|string|max:255',
            'reason'      => 'nullable|string',
            'status'      => 'required|string|in:pending,approved,rejected',
        ]);

        Leave::create($data);

        return redirect()
            ->route('leaves.index')
            ->with('success', 'تم إضافة طلب الإجازة بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        $leave->load('employee');
        return view('leaves.show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        $employees = Employee::orderBy('last_name')->get();
        // $types = ['annual', 'sick', 'maternity', ...];
        // $statuses = ['pending', 'approved', 'rejected'];

        return view('leaves.edit', compact('leave', 'employees' /*, 'types', 'statuses'*/));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'type'        => 'required|string|max:255',
            'reason'      => 'nullable|string',
            'status'      => 'required|string|in:pending,approved,rejected',
        ]);

        $leave->update($data);

        return redirect()
            ->route('leaves.index')
            ->with('success', 'تم تحديث طلب الإجازة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()
            ->route('leaves.index')
            ->with('success', 'تم حذف طلب الإجازة بنجاح.');
    }
}

