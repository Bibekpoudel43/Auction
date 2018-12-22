<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\User;
use App\Product;

class BidController extends Controller
{
    
    public function storeBidding(Request $request){

    	$bid = new Bid();

    	$bid->bid_amount = $request->bid_amount;
    	$bid->user_id = $request->user_id;
    	$bid->item_id = $request->item_id;

    	$bid->save();

    	return redirect('/items');
    }

    public function showBidList($productId = null){
		$products =  \App\Item::all();

			if($productId) {
				$bid = \App\Item::where('id', $productId)->with('userBid')->get();
				return view('admin.bid.show-bid-lists', compact('bid', 'products'));
			}
	
			$bid = \App\Item::with('userBid')->get();
			return view('admin.bid.show-bid-lists', compact('bid', 'products'));
	}
}
