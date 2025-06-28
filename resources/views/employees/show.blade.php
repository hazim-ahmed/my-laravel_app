@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10 px-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">تفاصيل الموظف</h1>

    <div class="bg-white rounded-xl shadow-md mb-6">
        <div class="p-6">
            <h5 class="text-xl font-semibold text-gray-700 mb-4">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            <div class="space-y-3 text-gray-600">
                <p><span class="font-medium text-gray-800">البريد الإلكتروني:</span> {{ $employee->email }}</p>
                <p><span class="font-medium text-gray-800">الهاتف:</span> {{ $employee->phone }}</p>
                <p><span class="font-medium text-gray-800">المسمى الوظيفي:</span> {{ $employee->jobTitle->name ?? '-' }}</p>
                <p><span class="font-medium text-gray-800">القسم:</span> {{ $employee->department->name ?? '-' }}</p>
                <p><span class="font-medium text-gray-800">تاريخ التوظيف:</span> {{ $employee->hired_at->format('Y-m-d') }}</p>
            </div>
        </div>
    </div>

    <a href="{{ route('employees.index') }}"
       class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-6 rounded-lg transition">
        عودة
    </a>
</div>
@endsection
