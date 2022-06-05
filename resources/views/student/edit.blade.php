@extends('layouts.app')


@section('title', 'Update Student Now')

@section('main')
	<div class="wrap ">
		<a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Back</a>
		<br>
		<br>
		<div class="card shadow-sm">
			<div class="card-body">
				<h2>Update Student Data</h2>

				@if( $errors -> any() ) 
					<p class="alert alert-danger"> {{ $errors -> first() }} <button class="close" data-dismiss="alert">&times;</button> </p>
				@endif

				@if( Session::has('success') ) 
					<p class="alert alert-success"> {{ Session::get('success') }} <button class="close" data-dismiss="alert">&times;</button> </p> 
				@endif

				<form action="{{ route('student.update', $edit_data -> id ) }}" method="POST">
					@csrf 
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{ $edit_data -> name }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{ $edit_data -> email }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{ $edit_data -> cell }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="{{ $edit_data -> username }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Education</label>
						<select class="form-control" name="edu" id="">
							<option value="">-Select-</option>
							<option @if($edit_data -> education == 'SSC') selected @endif value="SSC">SSC</option>
							<option @if($edit_data -> education == 'HSC') selected @endif value="HSC">HSC</option>
							<option @if($edit_data -> education == 'BSc') selected @endif value="BSc">BSc</option>
						</select>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Update Now">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection 	




	