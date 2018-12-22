<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        if(Auth::user())
        {
            return view('Items.index', ['items' => $items]);
        }
        elseif (Auth::guard('admin'))
        {
         return view('admin.products.view-product', ['items' => $items]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories= Category::pluck('name', 'id')->toArray();
        return view('Items.create', compact('categories', $categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $item = new Item();

         $item->name = $request->name;
         $item->description = $request->description;
         $item->initial_price = $request->initial_price;
         $item->market_price = $request->market_price;
         $item->end_date_time = Carbon::parse($request->end_date_time);
         $item->category_id = $request->categories;


         $image_file = $request->file('image');
         $filename = $request->user_id . '_' . $image_file->getClientOriginalName();

         if($image_file){
            Storage::disk('local')->put($filename, File::get($image_file));
         }

         $item->image_name = $filename;

         $item->save();

         return redirect('/items');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $items = Item::findOrFail($item);
        //return $items;
        return view('Items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $items = Item::findOrFail($item);
        //return $items;
        return view('Items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $items = Item::findOrFail($item);

         $item->name = $request->name;
         $item->description = $request->description;
         $item->initial_price = $request->initial_price;
         $item->end_date_time = Carbon::parse($request->end_date_time);
         $item->user_id = $request->user_id;


         if($request['image_name']){
            $image_file = $request->file('image');
            $filename = $request->user_id . '_' . $image_file->getClientOriginalName();

            if($image_file){
            Storage::disk('local')->put($filename, File::get($image_file));
                    }

            $item->image_name = $filename;
            }

         $item->update();

         return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
         Item::destroy($item->id);

        return redirect('/items');
    }
}
