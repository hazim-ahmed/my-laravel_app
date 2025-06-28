@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-8">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">إضافة مسمى وظيفة جديد</h1>

        @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('job_titles.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block mb-1 text-gray-700 font-medium">الاسم</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="description" class="block mb-1 text-gray-700 font-medium">الوصف</label>
                <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description') }}</textarea>
            </div>
            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">حفظ</button>
                <a href="{{ route('job_titles.index') }}" class="text-gray-600 hover:text-blue-600 transition">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
