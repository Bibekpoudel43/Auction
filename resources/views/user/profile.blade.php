@extends('layouts/app')

<style>
	.profile-img{
		max-width: 150px;
		border: 5px solid #fff;
		border-radius: 100%;
		box-shadow:0 2px 2px rgba(0, 0, 0, 0.3);
	}

</style>

@section('content')
<div class="row">
	<div class="col-md-6 mx-auto text-white">
		<div class="card text-center bg-dark">
			<img src="{{ asset('image/icon.jpg') }}" alt="" class="profile-img mx-auto mt-3">
			<div class="card-body">
				<h2>
					{{ $users->username}}
				</h2>
				<h5>
					{{ $users->address}}
				</h5>
				<h5>
					{{$users->phone_no}}
				</h5>
			</div>
		</div>
	</div>
</div>
@endsection