@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">تفاصيل قيد الراتب</h1>

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <div class="mb-4">
            <p class="text-gray-500 mb-1">الموظف</p>
            <p class="text-lg font-medium text-gray-900">{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-500 mb-1">المبلغ</p>
            <p class="text-lg font-medium text-green-600">{{ number_format($salary->amount, 2) }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-500 mb-1">تاريخ الدفع</p>
            <p class="text-lg font-medium text-gray-900">{{ $salary->pay_date->format('Y-m-d') }}</p>
        </div>
        <div>
            <p class="text-gray-500 mb-1">ملاحظات</p>
            <p class="text-lg font-medium text-gray-900">{{ $salary->notes ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('salaries.index') }}" class="block w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 rounded transition">عودة</a>
</div>
@endsection
