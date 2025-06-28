@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">تعديل مسمى الوظيفة</h1>

        @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('job_titles.update', $jobTitle) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block mb-1 text-gray-700 font-medium">الاسم</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" value="{{ old('name', $jobTitle->name) }}" required>
            </div>
            <div>
                <label for="description" class="block mb-1 text-gray-700 font-medium">الوصف</label>
                <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">{{ old('description', $jobTitle->description) }}</textarea>
            </div>
            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition">تحديث</button>
                <a href="{{ route('job_titles.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-md transition">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
