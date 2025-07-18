@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-xl shadow-md p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">تعديل قيد الراتب</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salaries.update', $salary) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="employee_id" class="block mb-1 text-gray-700 font-medium">الموظف</label>
            <select name="employee_id" id="employee_id" class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">اختر الموظف</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" {{ old('employee_id', $salary->employee_id) == $emp->id ? 'selected' : '' }}>
                        {{ $emp->first_name }} {{ $emp->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="amount" class="block mb-1 text-gray-700 font-medium">المبلغ</label>
            <input type="number" name="amount" id="amount" class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('amount', $salary->amount) }}" step="0.01" required>
        </div>
        <div>
            <label for="pay_date" class="block mb-1 text-gray-700 font-medium">تاريخ الدفع</label>
            <input type="date" name="pay_date" id="pay_date" class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('pay_date', $salary->pay_date->format('Y-m-d')) }}" required>
        </div>
        <div>
            <label for="notes" class="block mb-1 text-gray-700 font-medium">ملاحظات</label>
            <textarea name="notes" id="notes" rows="3" class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('notes', $salary->notes) }}</textarea>
        </div>
        <div class="flex justify-between items-center pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition">تحديث</button>
            <a href="{{ route('salaries.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-lg transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
