@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-8 text-center text-gray-800">تعديل بيانات الموظف</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee) }}" method="POST" class="bg-white shadow rounded-lg p-8 space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">الاسم الأول</label>
                <input type="text" name="first_name" id="first_name" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('first_name', $employee->first_name) }}" required>
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-700">اسم العائلة</label>
                <input type="text" name="last_name" id="last_name" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('last_name', $employee->last_name) }}" required>
            </div>
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('email', $employee->email) }}" required>
        </div>
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">الهاتف</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="job_title_id" class="form-label">المسمى الوظيفي</label>
                <select name="job_title_id" id="job_title_id" class="form-select" required>
                    <option value="">اختر المسمى</option>
                    @foreach($jobTitles as $job)
                        <option value="{{ $job->id }}" {{ old('job_title_id', $employee->job_title_id) == $job->id ? 'selected' : '' }}>{{ $job->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="department_id" class="form-label">القسم</label>
                <select name="department_id" id="department_id" class="form-select" required>
                    <option value="">اختر القسم</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id) == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="hired_at" class="form-label">تاريخ التوظيف</label>
            <input type="date" name="hired_at" id="hired_at" class="form-control" value="{{ old('hired_at', $employee->hired_at->format('Y-m-d')) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection


