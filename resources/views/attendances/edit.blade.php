@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">تعديل الحضور</h1>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendances.update', $attendance) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="employee_id" class="block mb-1 text-gray-700 font-medium">الموظف</label>
            <select name="employee_id" id="employee_id" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-100 transition p-2" required>
                <option value="">اختر الموظف</option>
                @foreach(\App\Models\Employee::orderBy('last_name')->get() as $emp)
                    <option value="{{ $emp->id }}" {{ old('employee_id', $attendance->employee_id) == $emp->id ? 'selected' : '' }}>
                        {{ $emp->first_name }} {{ $emp->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date" class="block mb-1 text-gray-700 font-medium">التاريخ</label>
            <input type="date" name="date" id="date" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-100 transition p-2" value="{{ old('date', $attendance->date->format('Y-m-d')) }}" required>
        </div>
        <div>
            <label for="check_in" class="block mb-1 text-gray-700 font-medium">وقت الدخول</label>
            <input type="time" name="check_in" id="check_in" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-100 transition p-2" value="{{ old('check_in', $attendance->check_in) }}" required>
        </div>
        <div>
            <label for="check_out" class="block mb-1 text-gray-700 font-medium">وقت الخروج</label>
            <input type="time" name="check_out" id="check_out" class="w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-100 transition p-2" value="{{ old('check_out', $attendance->check_out) }}">
        </div>
        <div class="flex items-center justify-between pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md shadow transition">تحديث</button>
            <a href="{{ route('attendances.index') }}" class="text-gray-600 hover:text-blue-600 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
