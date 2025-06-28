<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with('employee')->orderBy('date', 'desc')->get();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // إذا كنت تحتاج قائمة بالموظفين للاختيار
        // $employees = Employee::all();
        return view('attendances.create' /*, compact('employees')*/);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date'        => 'required|date',
            'check_in'    => 'required|date_format:H:i',
            'check_out'   => 'nullable|date_format:H:i|after:check_in',
        ]);

        Attendance::create($data);

        return redirect()
            ->route('attendances.index')
            ->with('success', 'تم إضافة سجل الحضور بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        // $employees = Employee::all();
        return view('attendances.edit', compact('attendance' /*, 'employees'*/));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date'        => 'required|date',
            'check_in'    => 'required|date_format:H:i',
            'check_out'   => 'nullable|date_format:H:i|after:check_in',
        ]);

        $attendance->update($data);

        return redirect()
            ->route('attendances.index')
            ->with('success', 'تم تحديث سجل الحضور بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()
            ->route('attendances.index')
            ->with('success', 'تم حذف سجل الحضور بنجاح.');
    }
}
