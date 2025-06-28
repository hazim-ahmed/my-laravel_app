<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <!-- Tailwind CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet"> --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="flex min-h-screen">
        <!-- الشريط الجانبي -->
        <nav class="bg-white border-l-4 border-blue-500 w-64 min-h-screen shadow-lg flex flex-col">
            <div class="p-6">
                <h4 class="text-2xl font-bold text-blue-600 mb-8 text-center">التنقل</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ url('/') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">الرئيسية</a>
                    </li>
                    <li>
                        <a href="{{ route('departments.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">الأقسام</a>
                    </li>
                    <li>
                        <a href="{{ route('employees.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">الموظفون</a>
                    </li>
                    <li>
                        <a href="{{ route('job_titles.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">مسميات الوظائف</a>
                    </li>
                    <li>
                        <a href="{{ route('attendances.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">سجلات الحضور</a>
                    </li>
                    <li>
                        <a href="{{ route('leaves.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">طلبات الإجازة</a>
                    </li>
                    <li>
                        <a href="{{ route('salaries.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">سجلات الرواتب</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- المحتوى الرئيسي -->
        <main class="flex-1 p-8 bg-gray-50">
            @yield('content')
        </main>
    </div>
</body>
</html>
