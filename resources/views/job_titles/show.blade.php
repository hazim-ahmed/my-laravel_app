@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $jobTitle->name }}</h5>
            <p class="card-text">{{ $jobTitle->description }}</p>
        </div>
    </div>
    <a href="{{ route('job_titles.index') }}" class="btn btn-secondary">عودة</a>
</div>
@endsection
