@extends('layouts.app')

@section('title', 'Single Staff Data')

@section('main')

<div class="wrap ">
    <a class="btn btn-primary btn-sm" href="{{ route('staff.index') }}">Back</a>
    <br>
    <br>
    <div class="card shadow">
        <div class="card-body">
            <img class="shadow" style="width:250px;height:250px; border-radius:50%;" src="{{ url('storage/staff/' . $staff -> photo ) }}" alt="">
            <h1>{{ $staff -> name }}</h1>
            <h3>{{ $staff -> email }}</h3>
            <p>{{ $staff -> cell }}</p>
        </div>
    </div>
</div>

@endsection