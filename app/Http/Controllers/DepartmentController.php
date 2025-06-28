<?php



namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('name')->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string',
        ]);

        Department::create($data);

        return redirect()
            ->route('departments.index')
            ->with('success', 'تم إنشاء القسم بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        // مع تحميل الموظفين المرتبطين إذا احتجت
        // $department->load('employees');
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:departments,name,' . $department->id,
            'description' => 'nullable|string',
        ]);

        $department->update($data);

        return redirect()
            ->route('departments.index')
            ->with('success', 'تم تحديث القسم بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        // يمكنك التحقق من خلو القسم من الموظفين قبل الحذف:
        // if ($department->employees()->count()) {
        //     return back()->withErrors('لا يمكن حذف قسم يحتوي على موظفين.');
        // }

        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'تم حذف القسم بنجاح.');
    }
}
