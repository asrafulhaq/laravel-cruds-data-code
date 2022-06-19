@extends('layouts.app')


@section('title', 'Create a new Staff Now')

@section('main')
	<div class="wrap ">
		<a class="btn btn-primary btn-sm" href="{{ route('staff.index') }}">Back</a>
		<br>
		<br>
		<div class="card shadow-sm">
			<div class="card-body">
				<h2>Edit Staff Data</h2>

                @include('validate')


				<form action="{{ route('staff.update', $staff -> id ) }}" method="POST">
					@csrf 
                    @method('PUT')
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{ $staff ->   name }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{ $staff ->   email }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{ $staff -> cell }}" type="text">
					</div>

					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection 	




	