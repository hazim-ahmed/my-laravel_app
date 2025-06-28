@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">الموظفين</h1>
        <a href="{{ route('employees.create') }}" class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">إضافة موظف جديد</a>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">#</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">الاسم الكامل</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">البريد الإلكتروني</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">الهاتف</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">المسمى الوظيفي</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">القسم</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">تاريخ التوظيف</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($employees as $employee)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-right text-gray-700">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $employee->email }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $employee->phone }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $employee->jobTitle->name ?? '-' }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $employee->department->name ?? '-' }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $employee->hired_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-3 text-right space-x-1 space-x-reverse">
                        <a href="{{ route('employees.show', $employee) }}" class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 text-xs">عرض</a>
                        <a href="{{ route('employees.edit', $employee) }}" class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 text-xs">تعديل</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 text-xs">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
