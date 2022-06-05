@extends('layouts.app')


@section('title', 'Create a ne Student Now')

@section('main')
	<div class="wrap ">
		<a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Back</a>
		<br>
		<br>
		<div class="card shadow-sm">
			<div class="card-body">
				<h2>Add new Student</h2>

				@if( $errors -> any() ) 
					<p class="alert alert-danger"> {{ $errors -> first() }} <button class="close" data-dismiss="alert">&times;</button> </p>
				@endif

				@if( Session::has('success') ) 
					<p class="alert alert-success"> {{ Session::get('success') }} <button class="close" data-dismiss="alert">&times;</button> </p> 
				@endif

				<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
					@csrf 
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{ old('name') }}" type="text">
						@error('name')
							<p class="text-danger">* Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{ old('email') }}" type="text">
						@error('email')
							<p class="text-danger">* Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{ old('cell') }}" type="text">
						@error('cell')
							<p class="text-danger">* Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="{{ old('username') }}" type="text">
						@error('username')
							<p class="text-danger">* Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" value="{{ old('age') }}" type="text">
						
					</div>
					<div class="form-group">
						<label for="">Education</label>
						<select class="form-control" name="edu" id="">
							<option value="">-Select-</option>
							<option value="SSC">SSC</option>
							<option value="HSC">HSC</option>
							<option value="BSc">BSc</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Select a Photo</label>
						<input name="photo"  type="file">
					</div>

					<div class="form-group">
						<label for="">Gender</label>
						<hr>
						<label>
							<input name="gender" value="Male" type="radio">
							Male
						</label>
						<label>
							<input name="gender" value="Female" type="radio">
							Female
						</label>
					</div>

					<div class="form-group">
						<label for="">Select your courses</label>
						<hr>
						<label>
							<input name="course[]" value="MERN Stack Devs" type="checkbox">
							MERN Stack Devs
						</label>
						<br>
						<label>
							<input name="course[]" value="NFT Devs" type="checkbox">
							NFT Devs
						</label>
						<br>
						<label>
							<input name="course[]" value="BlockChain Devs" type="checkbox">
							BlockChain Devs
						</label>
						<br>
						<label>
							<input name="course[]" value="Laravel Devs" type="checkbox">
							Laravel Devs
						</label>
						<br>
						<label>
							<input name="course[]" value="Django Devs" type="checkbox">
							Django Devs
						</label>
						<br>
						<label>
							<input name="course[]" type="checkbox">
							React Devs
						</label>
						<br>
						<label>
							<input name="course[]" value="Native Apps Devs" type="checkbox">
							Native Apps Devs
						</label>
					</div>

					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add now">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection 	




	