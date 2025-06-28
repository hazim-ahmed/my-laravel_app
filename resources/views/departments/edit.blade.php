@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white rounded-lg shadow-md p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">تعديل القسم</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.update', $department) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">اسم القسم</label>
            <input type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-right" value="{{ old('name', $department->name) }}" required>
        </div>
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-700">الوصف</label>
            <textarea name="description" id="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-right">{{ old('description', $department->description) }}</textarea>
        </div>
        <div class="flex justify-between">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">تحديث</button>
            <a href="{{ route('departments.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">إلغاء</a>
        </div>
    </form>
</div>
@endsection
