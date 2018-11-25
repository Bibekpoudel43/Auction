@extends('layouts.app')
@section('title', 'Item')
@section('content')
<div class="row">
	<div class="col-md-6 mx-auto text-center">
		<h3 class="my-3 lead bg-dark d-inline text-white">Edit a Product</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-6 mx-auto text-white">
		<form action="/items/{{$item->id}}" method="POST" enctype="multipart/form-data">
			{{method_field('PUT')}}
			{{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
    		<div class="form-group">
    			<label class="form-label" for="name">Name</label>
    			<input class="form-control" type="text" name="name" id="name" required value="{{$item->name}}"> 
    		</div>
    		<div class="form-group">
    			<label class="form-label" for="des">Description</label>
    			<textarea class="form-control" name="description" id="des" required>{{$item->description}}</textarea> 
    		</div>
    		<div class="form-group">
    			<label class="form-label" for="initp">Initial Price</label>
    			<input type="text" name="initial_price" class="form-control" id="initp" required  value="{{$item->initial_price}}">
    		</div> 
    		<div class="form-group">
    			<label class="form-label" for="edate">End DateTime</label>
    			<input type="datetime-local" class="form-control" name="end_date_time" id="idate" required  value="{{$item->end_date_time->format('Y-m-d\TH:i:s')}}">
    		</div>
    		<div class="form-group">
    			<label class="form-label" for="file">Upload Image</label> <br>
    			<input type="file" name="image" id="file" class="from-control">
    		</div>
    		<div class="form-group">
    			<input type="submit" class="form-control-file btn btn-primary" name="submit" value="Update">
    		</div>
        </form>
	</div>
</div>
@endsection