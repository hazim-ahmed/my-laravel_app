@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white rounded-xl shadow-md p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">إضافة سجل حضور</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendances.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-700">الموظف</label>
            <select name="employee_id" id="employee_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-700" required>
                <option value="">اختر الموظف</option>
                @foreach(\App\Models\Employee::orderBy('last_name')->get() as $emp)
                    <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>
                        {{ $emp->first_name }} {{ $emp->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date" class="block mb-2 text-sm font-medium text-gray-700">التاريخ</label>
            <input type="date" name="date" id="date" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-700" value="{{ old('date') }}" required>
        </div>
        <div>
            <label for="check_in" class="block mb-2 text-sm font-medium text-gray-700">وقت الدخول</label>
            <input type="time" name="check_in" id="check_in" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-700" value="{{ old('check_in') }}" required>
        </div>
        <div>
            <label for="check_out" class="block mb-2 text-sm font-medium text-gray-700">وقت الخروج</label>
            <input type="time" name="check_out" id="check_out" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-700" value="{{ old('check_out') }}">
        </div>
        <div class="flex justify-between items-center pt-4">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">حفظ</button>
            <a href="{{ route('attendances.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
