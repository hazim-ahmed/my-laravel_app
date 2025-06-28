@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">إضافة طلب إجازة</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaves.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label for="employee_id" class="block mb-1 font-medium text-gray-700">الموظف</label>
            <select name="employee_id" id="employee_id" class="w-full rounded border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                <option value="">اختر الموظف</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>{{ $emp->first_name }} {{ $emp->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label for="start_date" class="block mb-1 font-medium text-gray-700">من تاريخ</label>
                <input type="date" name="start_date" id="start_date" class="w-full rounded border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ old('start_date') }}" required>
            </div>
            <div class="flex-1">
                <label for="end_date" class="block mb-1 font-medium text-gray-700">إلى تاريخ</label>
                <input type="date" name="end_date" id="end_date" class="w-full rounded border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ old('end_date') }}" required>
            </div>
        </div>
        <div>
            <label for="type" class="block mb-1 font-medium text-gray-700">النوع</label>
            <input type="text" name="type" id="type" class="w-full rounded border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ old('type') }}" required>
        </div>
        <div>
            <label for="reason" class="block mb-1 font-medium text-gray-700">السبب</label>
            <textarea name="reason" id="reason" rows="3" class="w-full rounded border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('reason') }}</textarea>
        </div>
        <div>
            <label for="status" class="block mb-1 font-medium text-gray-700">الحالة</label>
            <select name="status" id="status" class="w-full rounded border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                <option value="pending" {{ old('status')=='pending'? 'selected':'' }}>قيد الانتظار</option>
                <option value="approved" {{ old('status')=='approved'? 'selected':'' }}>موافقة</option>
                <option value="rejected" {{ old('status')=='rejected'? 'selected':'' }}>مرفوضة</option>
            </select>
        </div>
        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow transition">حفظ</button>
            <a href="{{ route('leaves.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-6 rounded shadow transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
