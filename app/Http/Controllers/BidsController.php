<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;

class BidsController extends Controller
{
    
    public function storeBidding(Request $request){

    	$bid = new Bid();

    	$bid->bid_amount = $request->bid_amount;
    	$bid->user_id = $request->user_id;
    	$bid->item_id = $request->item_id;

    	$bid->save();

    	return redirect('/items');
    }

    public function showCurrentBid(Bid $bid){
    	$bids = Bid::findOrFail($bid);

    	return view('Items.show', compact('bid'));
    }
}
