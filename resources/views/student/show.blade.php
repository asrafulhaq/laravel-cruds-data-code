@extends('layouts.app')

@section('title', 'Single Student Data')

@section('main')

<div class="wrap ">
    <a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Back</a>
    <br>
    <br>
    <div class="card shadow">
        <div class="card-body">
            <img class="shadow" style="width:250px;height:250px; border-radius:50%;" src="{{ url('storage/students/' . $student -> photo ) }}" alt="">
            <h1>{{ $student -> name }}</h1>
            <h3>{{ $student -> email }}</h3>
            <p>{{ $student -> cell }}</p>
        </div>
    </div>
</div>

@endsection