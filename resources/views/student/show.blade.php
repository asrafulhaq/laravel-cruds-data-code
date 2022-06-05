@extends('layouts.app')

@section('title', 'Single Student Data')

@section('main')

<div class="wrap ">
    <a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Back</a>
    <br>
    <br>
    <div class="card shadow">
        <div class="card-body">
            {{-- <img src="assets/media/img/pp_photo/istockphoto-615279718-612x612.jpg" alt=""> --}}
            <h1>{{ $student -> name }}</h1>
            <h3>{{ $student -> email }}</h3>
            <p>{{ $student -> cell }}</p>
        </div>
    </div>
</div>

@endsection