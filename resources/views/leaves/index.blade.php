@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">طلبات الإجازة</h1>
        <a href="{{ route('leaves.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">إضافة طلب إجازة</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">الموظف</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">من تاريخ</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">إلى تاريخ</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">النوع</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">الحالة</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($leaves as $leave)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-right text-gray-700">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $leave->employee->first_name }} {{ $leave->employee->last_name }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ \Carbon\Carbon::parse($leave->start_date)->format('Y-m-d') }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ \Carbon\Carbon::parse($leave->end_date)->format('Y-m-d') }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $leave->type }}</td>
                    <td class="px-4 py-3 text-right">
                        <span class="inline-block px-2 py-1 rounded text-xs font-semibold
                            @if($leave->status == 'approved') bg-green-100 text-green-700
                            @elseif($leave->status == 'pending') bg-yellow-100 text-yellow-700
                            @else bg-red-100 text-red-700 @endif">
                            {{ ucfirst($leave->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right space-x-1 space-x-reverse">
                        <a href="{{ route('leaves.show', $leave) }}" class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-xs">عرض</a>
                        <a href="{{ route('leaves.edit', $leave) }}" class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-xs">تعديل</a>
                        <form action="{{ route('leaves.destroy', $leave) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-xs">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
