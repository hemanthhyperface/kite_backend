<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrder;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
 
class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = CustomerOrder::where('user_id',Auth::user()->id)->get();
        if ($orders) {
            return response()->json(['orders' => $orders]);
        } else {
            return response(0);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instrument = Instrument::where('id',$request->instrument_id)->first();
        $order = new CustomerOrder;
        $order->user_id = Auth::user()->id;
        $order->instrument_id = $request->instrument_id;
        $order->price = $request->price;
        $order->type = $request->trade_type;
        $order->ordered_at = Carbon::now();
        if($instrument->cmp == $request->price){
        $order->executed_at = Carbon::now();
        $order->status = 1;
        }else{
        $order->status = 0;
        }
        $order->save();
        return $order;
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerOrder $customerOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerOrder $customerOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerOrder $customerOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerOrder $customerOrder)
    {
        //
    }
}
