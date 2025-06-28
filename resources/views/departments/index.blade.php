@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">الأقسام</h1>
        <a href="{{ route('departments.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">إضافة قسم جديد</a>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white text-right">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="py-3 px-4 font-semibold">#</th>
                    <th class="py-3 px-4 font-semibold">الاسم</th>
                    <th class="py-3 px-4 font-semibold">الوصف</th>
                    <th class="py-3 px-4 font-semibold">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ $department->name }}</td>
                    <td class="py-2 px-4">{{ $department->description }}</td>
                    <td class="py-2 px-4 flex flex-wrap gap-2">
                        <a href="{{ route('departments.show', $department) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-sm">عرض</a>
                        <a href="{{ route('departments.edit', $department) }}" class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-sm">تعديل</a>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
