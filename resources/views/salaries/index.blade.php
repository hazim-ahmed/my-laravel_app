@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">سجلات الرواتب</h1>
        <a href="{{ route('salaries.create') }}" class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">إضافة قيد راتب جديد</a>
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
                    <th class="py-3 px-4 font-semibold">الموظف</th>
                    <th class="py-3 px-4 font-semibold">المبلغ</th>
                    <th class="py-3 px-4 font-semibold">تاريخ الدفع</th>
                    <th class="py-3 px-4 font-semibold">ملاحظات</th>
                    <th class="py-3 px-4 font-semibold">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salaries as $salary)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                    <td class="py-3 px-4">{{ number_format($salary->amount, 2) }}</td>
                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($salary->pay_date)->format('Y-m-d') }}</td>
                    <td class="py-3 px-4">{{ $salary->notes ?? '-' }}</td>
                    <td class="py-3 px-4 flex flex-col sm:flex-row gap-2">
                        <a href="{{ route('salaries.show', $salary) }}" class="px-3 py-1 bg-cyan-600 text-white rounded hover:bg-cyan-700 text-sm transition">عرض</a>
                        <a href="{{ route('salaries.edit', $salary) }}" class="px-3 py-1 bg-yellow-400 text-gray-900 rounded hover:bg-yellow-500 text-sm transition">تعديل</a>
                        <form action="{{ route('salaries.destroy', $salary) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
