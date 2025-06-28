@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تفاصيل طلب الإجازة</h1>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>الموظف:</strong> {{ $leave->employee->first_name }} {{ $leave->employee->last_name }}</p>
            <p><strong>من تاريخ:</strong> {{ $leave->start_date->format('Y-m-d') }}</p>
            <p><strong>إلى تاريخ:</strong> {{ $leave->end_date->format('Y-m-d') }}</p>
            <p><strong>النوع:</strong> {{ $leave->type }}</p>
            <p><strong>السبب:</strong> {{ $leave->reason ?? '-' }}</p>
            <p><strong>الحالة:</strong> {{ ucfirst($leave->status) }}</p>
        </div>
    </div>

    <a href="{{ route('leaves.index') }}" class="btn btn-secondary">عودة</a>
</div>
@endsection
