<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function sendItemToHighestBidder($productId = 0)
    {

        if($productId === 0) {

            session()->flash('success', 'Not a valid product.');
            return redirect()->back();
        }

        $today = \Carbon\Carbon::today()->toDateString();

        if(\App\Item::where('id', $productId)->where('end_date_time', '<', $today)->get()->count() <= 0) {

            session()->flash('success', 'Cannot sell product. There is still time left.');
            return redirect()->back();
        } else {

            
            
                $highestAmountForProduct = \App\Bid::where('item_id', $productId)->max('amount');
                $bid = \App\Bid::where('item_id', $productId)
                                        ->where('amount', $highestAmountForProduct)->first();
    
                $userId = $bid->user_id;
                                
                $purchase = new \App\Purchase;
                $purchase->item_id = $productId;
                $purchase->user_id = $userId;
                $purchase->amount = $highestAmountForProduct;
                $purchase->save();
    
                $product = \App\Item::find($productId);
                $product->isSold = 1;
                $product->save();
    
                session()->flash('success', 'Bidding sold to highest bidder.');
                return redirect()->back();
        }

    }

}
