@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">تفاصيل القسم</h1>

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h5 class="text-xl font-semibold text-gray-700 mb-2">{{ $department->name }}</h5>
        <p class="text-gray-500">{{ $department->description }}</p>
    </div>
    <div class="flex justify-center">
        <a href="{{ route('departments.index') }}" class="px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded transition">عودة</a>
    </div>
</div>
@endsection
