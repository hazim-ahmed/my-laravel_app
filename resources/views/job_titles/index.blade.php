@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">مسميات الوظائف</h1>
        <a href="{{ route('job_titles.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow transition">إضافة مسمى وظيفة جديد</a>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded shadow bg-white">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">#</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">الاسم</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">الوصف</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($jobTitles as $job)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-right text-gray-700">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $job->name }}</td>
                    <td class="px-4 py-3 text-right text-gray-700">{{ $job->description }}</td>
                    <td class="px-4 py-3 flex flex-wrap gap-2 justify-end">
                        <a href="{{ route('job_titles.show', $job) }}" class="bg-cyan-500 hover:bg-cyan-600 text-white px-3 py-1 rounded text-xs font-medium transition">عرض</a>
                        <a href="{{ route('job_titles.edit', $job) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-medium transition">تعديل</a>
                        <form action="{{ route('job_titles.destroy', $job) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium transition">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
