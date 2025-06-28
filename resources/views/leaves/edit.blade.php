@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تعديل طلب إجازة</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaves.update', $leave) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="employee_id" class="form-label">الموظف</label>
            <select name="employee_id" id="employee_id" class="form-select" required>
                <option value="">اختر الموظف</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" {{ old('employee_id', $leave->employee_id) == $emp->id ? 'selected' : '' }}>{{ $emp->first_name }} {{ $emp->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">من تاريخ</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $leave->start_date->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label">إلى تاريخ</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $leave->end_date->format('Y-m-d')) }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">النوع</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $leave->type) }}" required>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label">السبب</label>
            <textarea name="reason" id="reason" class="form-control">{{ old('reason', $leave->reason) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">الحالة</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending" {{ old('status', $leave->status)=='pending'? 'selected':'' }}>قيد الانتظار</option>
                <option value="approved" {{ old('status', $leave->status)=='approved'? 'selected':'' }}>موافقة</option>
                <option value="rejected" {{ old('status', $leave->status)=='rejected'? 'selected':'' }}>مرفوضة</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('leaves.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
