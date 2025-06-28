@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow-md p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">إضافة موظف جديد</h1>

    @if($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="block mb-1 text-gray-700 font-medium">الاسم الأول</label>
                <input type="text" name="first_name" id="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('first_name') }}" required>
            </div>
            <div>
                <label for="last_name" class="block mb-1 text-gray-700 font-medium">اسم العائلة</label>
                <input type="text" name="last_name" id="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('last_name') }}" required>
            </div>
        </div>
        <div>
            <label for="email" class="block mb-1 text-gray-700 font-medium">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="phone" class="block mb-1 text-gray-700 font-medium">الهاتف</label>
            <input type="text" name="phone" id="phone" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('phone') }}">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="job_title_id" class="block mb-1 text-gray-700 font-medium">المسمى الوظيفي</label>
                <select name="job_title_id" id="job_title_id" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="">اختر المسمى</option>
                    @foreach($jobTitles as $job)
                        <option value="{{ $job->id }}" {{ old('job_title_id') == $job->id ? 'selected' : '' }}>{{ $job->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="department_id" class="block mb-1 text-gray-700 font-medium">القسم</label>
                <select name="department_id" id="department_id" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="">اختر القسم</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label for="hired_at" class="block mb-1 text-gray-700 font-medium">تاريخ التوظيف</label>
            <input type="date" name="hired_at" id="hired_at" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('hired_at') }}" required>
        </div>
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition">حفظ</button>
            <a href="{{ route('employees.index') }}" class="text-gray-600 hover:text-blue-600 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
