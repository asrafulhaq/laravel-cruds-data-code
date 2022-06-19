@extends('layouts.app')


@section('main')

	<div class="wrap-table">
		<a class="btn btn-primary btn-sm" href="{{ route('staff.create') }}">Add new Staff</a>		
		<br>
		<br>
		<div class="card shadow">

			
			<div class="card-body">
				<h2>All Staff</h2>
				@include('validate')
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th width="200">Action</th>
						</tr>
					</thead>
					<tbody>
						
						@forelse ($staff as $item)
							<tr>
								<td>{{ $item -> id }}</td>
								<td>{{ $item -> name }}</td>
								<td>{{ $item -> email }}</td>
								<td>{{ $item -> cell }}</td>
								<td><img src="{{ url('storage/staff/' . $item -> photo ) }}" alt=""></td>
								<td>
									<a class="btn btn-sm btn-info" href="{{ route('staff.show', $item -> id ) }}">view</a>
									<a class="btn btn-sm btn-warning" href="{{ route('staff.edit', $item -> id ) }}">edit</a>
									
									<form action="{{ route('staff.destroy', $item -> id ) }}" method="POST" class="d-inline">
										@csrf 
										@method('DELETE')
										<button class="btn btn-sm btn-danger delete-btn" type="submit">delete</button>
									</form>
								</td>
							</tr>
						@empty

						
							
						@endforelse
						

					</tbody>
				</table>

				{{ $staff -> links() }}
			</div>
		</div>
	</div>

	

@endsection 