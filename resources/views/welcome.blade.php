<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم الرئيسية</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet"> --}}
    @vite('resources/css/app.css')
    {{-- Uncomment the line below if you want to use Tailwind CSS from CDN --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet"> --}}


</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-10">
        <h1 class="mb-10 text-3xl font-bold text-center text-gray-800">لوحة التحكم الرئيسية</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Departments -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col items-center">
                <h5 class="text-xl font-semibold mb-2 text-gray-700">الأقسام</h5>
                <p class="text-gray-500 mb-4 text-center">إدارة أقسام الشركة.</p>
                <a href="{{ route('departments.index') }}" class="mt-auto inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">الانتقال</a>
            </div>
            <!-- Employees -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col items-center">
                <h5 class="text-xl font-semibold mb-2 text-gray-700">الموظفون</h5>
                <p class="text-gray-500 mb-4 text-center">عرض وإضافة وتعديل بيانات الموظفين.</p>
                <a href="{{ route('employees.index') }}" class="mt-auto inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">الانتقال</a>
            </div>
            <!-- Job Titles -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col items-center">
                <h5 class="text-xl font-semibold mb-2 text-gray-700">مسميات الوظائف</h5>
                <p class="text-gray-500 mb-4 text-center">إدارة مسميات الوظائف.</p>
                <a href="{{ route('job_titles.index') }}" class="mt-auto inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">الانتقال</a>
            </div>
            <!-- Attendances -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col items-center">
                <h5 class="text-xl font-semibold mb-2 text-gray-700">سجلات الحضور</h5>
                <p class="text-gray-500 mb-4 text-center">عرض سجلات الحضور اليومي.</p>
                <a href="{{ route('attendances.index') }}" class="mt-auto inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">الانتقال</a>
            </div>
            <!-- Leaves -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col items-center">
                <h5 class="text-xl font-semibold mb-2 text-gray-700">طلبات الإجازة</h5>
                <p class="text-gray-500 mb-4 text-center">إدارة طلبات إجازة الموظفين.</p>
                <a href="{{ route('leaves.index') }}" class="mt-auto inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">الانتقال</a>
            </div>
            <!-- Salaries -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col items-center">
                <h5 class="text-xl font-semibold mb-2 text-gray-700">سجلات الرواتب</h5>
                <p class="text-gray-500 mb-4 text-center">عرض وإدارة سجلات الرواتب.</p>
                <a href="{{ route('salaries.index') }}" class="mt-auto inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">الانتقال</a>
            </div>
        </div>
    </div>
</body>
</html>
