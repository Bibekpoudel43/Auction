@extends('layouts.app')
@section('title', 'Item')

@section('content')
<div class="row">
	<div class="col-md">
		<div class="d-flex flex-row">
	    	<div class="p-2">
				<img src="{{Storage::url($item->image_name)}}" class="w-100 img-thumbnail rounded" alt="" style="width: 550px; height: 330px;">
	    	</div>
	    	<div class="p-2 flex-grow-1 clearfix">
	    		<h3 class="d-inline">{{$item->name}}</h3> 
		    			@if ($item->user_id == Auth::id())
		    			<a href="/items/{{$item->id}}/edit" class="btn btn-primary ml-5 mb-2 btn-sm">Edit</a>
		    			<form action="/items/{{$item->id}}" method="POST" class="d-inline">
		    				{{csrf_field()}}
		    				{{method_field('DELETE')}}
		    				<button class="btn btn-danger ml-1 mb-2 btn-sm">Delete</button>
		    			</form>
		    			@endif
	    		<hr>
	    		{{$item->description}}
	    		<hr>
	    		<div class="d-flex flex-row">
	    			<div class="p-2">
	    				<pre>Auction Price:  {{$item->initial_price}}</pre>
						<pre>Market Price:  {{$item->market_price}}</pre>
	    				<pre>Current bid: null</pre>
	    				<pre class="d-inline ">Time left: </pre>
						<pre class="d-inline " id="time_left" style="font-weight: bold; font-size: 14px;">
						</pre>
	    			</div>
	    			@if($item->user_id != Auth::id())
	    			<div class="p-2 ml-5 mt-4">
	    				<form action="/items/{{$item->id}}/bid" method="POST">
	    					{{ csrf_field() }}
	    					<input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
	    					<input type="hidden" name="item_id" value="{{ $item->id}}">
	    					<input type="text" name="bid_amount">
	    					<input type="submit" role="button" class="btn btn-success btn-inline btn-m" value="Bid">
	    				</form>
	    			</div>
	    			@endif
	    		</div>
	    	</div>
 	 	</div>
	</div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
			// Set the date we're counting down to
//var countDownDate = new Date("Jan 5, 2019 15:37:25").getTime();
var countDownDate = new Date("<?php echo $item->end_date_time->format('F j Y, h:i:s')?>").getTime();


// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("time_left").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("time_left").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
@endsection