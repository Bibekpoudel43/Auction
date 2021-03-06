@extends('layouts.app')
@section('title', 'Home')
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 40%;
  }
  </style>
@section('content')

<div class="row py-3">
	@forelse($items as $item)
	<div class="col-md-3 col-sm-12">
		<div class="card mt-3 bg-dark">
			@if (Storage::disk('local')->has($item->image_name))
			<img src="{{Storage::url($item->image_name)}}" alt="" class="card-img-top" style="width:100%; height:150px;">
			@endif
			<div class="card-block text-center p-4">
					<h4 class="card-title">{{$item->name}}</h4>
			    	<p class="card-text">{{substr($item->description, 0, 55) . '...'}}</p>
			   	    <a href="{{!Auth::check() ? url('/login') : '/items/' . $item->id }}" class="btn btn-outline-success btn-block">Read More</a>
			</div>
		</div>
	  </div>
	  @empty
		<div class="col-auto mx-auto">
			<div class="alert alert-info" role="alert">
			  <strong class="text-center">No data has been added yet</strong> 
			  <p>
			  	You can upload your product for auction
				<a href="/items/create">here</a>.
			  </p>
			</div>
		</div>
    @endforelse
	</div>
@endsection