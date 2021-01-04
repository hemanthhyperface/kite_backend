<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Watchlist extends Model
{
    use HasFactory;
    protected $with = ['instrument'];

    protected $fillable = [
        'customer_id', 'watchlist_name', 'instrument_id'];

    public function instrument()
    {
        return $this->hasOne('App\Models\Instrument', 'id');
    }

    public function addToWatchlist($request)
    {
        // if ($request->customer_id && $request->watchlist_name && $request->instrument_id) {
            $w = new Watchlist;
            $w->customer_id = Auth::user()->id;
            $w->watchlist_name = 1;
            $w->instrument_id = $request->id;
            $w->save();
            $w = Watchlist::where('customer_id',Auth::user()->id)->where('instrument_id',$request->id)->with('instrument')->first();
            return $w;
        // } else {
        //     return 0;
        // }
    }

    public function removeFromWatchlist($request)
    {
        if ($request->customer_id && $request->watchlist_name && $request->instrument_id) {
            $watch_list = Watchlist::where('watchlist_name', $request->watchlist_name)->where('customer_id', $request->customer_id)->where('instrument_id', $request->instrument_id)->forceDelete();
            return 1;
        } else {
            return 0;
        }
    }
}
