<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{

        /**
     * Display a listing of the resource.
     */
    public function buy(Request $request)
    {
        $input  = json_decode(json_encode($request->all()), true);
        $resultArray = array_filter($input, function($key) use($input) {
            return strpos($key, 'id_item-') === 0 && $input[$key];
         }, ARRAY_FILTER_USE_KEY);

        if(count($resultArray)){

            $sales = Sales::create([
                'user_id'=>$request->user()->id,
                'submit_user_id'=>null,
            ]);
            foreach($resultArray as $item_id => $qty)
            $orders = \DB::table('orders')->insert([
                'sales_id'=>$sales->id,
                'item_id'=>explode('id_item-',$item_id)[1],
                'qty'=>$qty,
            ]);

            
        }
        return redirect(route('sales'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::getAllSales();

        return view ('sales.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales, $id)
    {
        $items = Sales::getSale($id);
        foreach ($items->orders as $key => $val) {
            $items->orders[$key] = (object) array_merge((array) $items->orders[$key], (array) $items->orders[$key]->items);
        }
        // dd($items);
        return view ('sales.show')->with('sales', $items);
    }


    /**
     * Submit the specified resource.
     */
    public function submit(Request $request, $id)
    {
        $items = Sales::find($id);
        $items->submit_user_id = $request->user()->id;
        $items->update();
        foreach((Sales::getSale($id))->orders as $order){
            \DB::table('items')->where(["id"=>$order->item_id])->update(["stok"=>$order->items->stok-$order->qty?$order->items->stok-$order->qty:0]);
        }
        // dd($items);
        return redirect(route('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
