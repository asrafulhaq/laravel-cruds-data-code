@extends('layouts.app')


@section('main')

	<div class="wrap-table">
		<a class="btn btn-primary btn-sm" href="{{ route('student.create') }}">Add new student</a>		
		@if( Session::has('success') ) 
		<br>
		<br>
			<p class="alert alert-success"> {{ Session::get('success') }} <button class="close" data-dismiss="alert">&times;</button> </p> 
		@endif
		<br>
		<br>
		<div class="card shadow">

			
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>Education</th>
							<th>Photo</th>
							<th width="200">Action</th>
						</tr>
					</thead>
					<tbody>

						@forelse( $students as $student )
						<tr>
							<td>{{ $loop -> index + 1 }}</td>
							<td>{{ $student -> name }}</td>
							<td>{{ $student -> email }}</td>
							<td>{{ $student -> cell }}</td>
							<td>{{ $student -> username }}</td>
							<td>{{ $student -> education }}</td>
							<td><img src="assets/media/img/pp_photo/istockphoto-615279718-612x612.jpg" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info"   href="{{ route('student.show', $student -> id) }}">View</a>
								<a class="btn btn-sm btn-warning" href="{{ route('student.edit', $student -> id) }}">Edit</a>
								<a class="btn btn-sm btn-danger delete-btn" href="{{ route('student.destroy', $student -> id) }}">Delete</a>
							</td>
						</tr>

						@empty
						<tr>
							<td colspan="8" class="text-center">No students found</td>
						</tr>
						@endforelse
						

					</tbody>
				</table>
			</div>
		</div>
	</div>

	

@endsection 