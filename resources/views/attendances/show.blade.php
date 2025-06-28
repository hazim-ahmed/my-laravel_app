@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">تفاصيل سجل الحضور</h1>

    <div class="mb-6 bg-gray-50 rounded-lg p-5 shadow-sm">
        <div class="mb-3">
            <span class="font-semibold text-gray-700">الموظف:</span>
            <span class="text-gray-900">{{ $attendance->employee->first_name }} {{ $attendance->employee->last_name }}</span>
        </div>
        <div class="mb-3">
            <span class="font-semibold text-gray-700">التاريخ:</span>
            <span class="text-gray-900">{{ $attendance->date->format('Y-m-d') }}</span>
        </div>
        <div class="mb-3">
            <span class="font-semibold text-gray-700">وقت الدخول:</span>
            <span class="text-gray-900">{{ $attendance->check_in }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">وقت الخروج:</span>
            <span class="text-gray-900">{{ $attendance->check_out ?? '-' }}</span>
        </div>
    </div>

    <a href="{{ route('attendances.index') }}"
       class="inline-block px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition font-medium text-center w-full">
        عودة
    </a>
</div>
@endsection
