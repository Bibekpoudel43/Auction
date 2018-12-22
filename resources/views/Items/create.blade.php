@extends('layouts.app')
@section('title', 'Product')
@section('content')
<div class="row">
	<div class="col-md-6 mx-auto text-center">
		<h3 class="my-3 lead bg-dark d-inline text-white">Upload Product for Auction</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-6 mx-auto text-white">
		<form action="/items" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
    		<div class="form-group">
    			<label class="form-label" for="name">Name</label>
    			<input class="form-control" type="text" name="name" id="name"required> 
    		</div>
    		<div class="form-group">
    			<label class="form-label" for="des">Description</label>
    			<textarea class="form-control" name="description" id="des" required></textarea> 
    		</div>
    		<div class="form-group">
    			<label class="form-label" for="initp">Initial Price</label>
    			<input type="text" name="initial_price" class="form-control" id="initp" required>
			</div> 
			<div class="form-group">
    			<label class="form-label" for="mprice">Market Price</label>
    			<input type="text" name="market_price" class="form-control" id="mprice" required>
    		</div> 
    		<div class="form-group">
    			<label class="form-label" for="edate">End DateTime</label>
    			<input type="datetime-local" class="form-control" name="end_date_time" id="edate" required>
    		</div>
    		<div class="form-group">
    			<label class="form-label" for="file">Upload Image</label> <br>
    			<input type="file" name="image" id="file" class="from-control" required>
			</div>
			<div class="form-group">
			<label class="form-label" for="cat">Select Category</label>
				<select name="categories" id="categories" class="form-control" required>
				@foreach($categories as $key => $value)
   					 <option value="{{ $key }}">{{ $value }}</option>
  				@endforeach
				</select>
			</div>
    		<div class="form-group">
    			<input type="submit" class="form-control-file btn btn-primary" name="submit">
    		</div>
        </form>
	</div>
</div>
@endsection