@extends('layouts.app')


@section('title', 'Create a new Staff Now')

@section('main')
	<div class="wrap ">
		<a class="btn btn-primary btn-sm" href="{{ route('staff.index') }}">Back</a>
		<br>
		<br>
		<div class="card shadow-sm">
			<div class="card-body">
				<h2>Add new Staff</h2>

                @include('validate')


				<form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
					@csrf 
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{ old('name') }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{ old('email') }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{ old('cell') }}" type="text">
					</div>


					<div class="form-group">
						<label for="">Select a Photo</label>
						<input name="photo"  type="file">
					</div>


					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add now">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection 	




	