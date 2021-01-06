<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Auth;
class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = 1;
        $wl1 =array();
        $wl2 =array();
        $wl3 =array();
        $wl4 =array();
        $wl5 =array();
        if ($customer) {
            $wl1= Watchlist::where('customer_id', Auth::user()->id)->where('watchlist_name',1)->get();
            $wl2=Watchlist::where('customer_id', Auth::user()->id)->where('watchlist_name',2)->get();
            $wl3=Watchlist::where('customer_id', Auth::user()->id)->where('watchlist_name',3)->get();
            $wl4=Watchlist::where('customer_id', Auth::user()->id)->where('watchlist_name',4)->get();
            $wl5=Watchlist::where('customer_id', Auth::user()->id)->where('watchlist_name',5)->get();
            if ($wl1) {
                return response()->json(['wl1' => $wl1,'wl2' => $wl2,'wl3' => $wl3,'wl4' => $wl4,'wl5' => $wl5,]);
            } else {
                return response(0);
            }
        } else {
            return response(-1);
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
        $wl1 =array();
        $wl2 =array();
        $wl3 =array();
        $wl4 =array();
        $wl5 =array();
        $watch_list = Watchlist::where('watchlist_name', 1)->where('customer_id', Auth::user()->id)->count();
        if ($watch_list < 50) {
            $w = (new Watchlist)->addToWatchlist($request);
            if ($w) {
                return response()->json(['wl1' => $w]);
            } else {
                return response(0);
            }
        } else {
            return response('WatchList already contains maximum items remove any item to proceed');
        }
    }

    public function removeItem(Request $request)
    {
        $watch_list = Watchlist::where('watchlist_name', $request->watchlist_name)->where('customer_id', $request->customer_id)->where('instrument_id', $request->instrument_id)->first();
        if ($watch_list) {
            $w = (new Watchlist)->removeFromWatchlist($request);
            return response($w);
        } else {
            return response('Item not found in your watchlist.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function show(Watchlist $watchlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Watchlist $watchlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Watchlist $watchlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watchlist $watchlist)
    {
        //
    }
}
