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
        return $this->hasOne('App\Models\Instrument', 'id','instrument_id');
    }

    public function addToWatchlist($request)
    {
        // if ($request->customer_id && $request->watchlist_name && $request->instrument_id) {
            $w = new Watchlist;
            $w->customer_id = Auth::user()->id;
            $w->watchlist_name = $request->activeList;
            $w->instrument_id = $request->id;
            $w->save();
            $w = Watchlist::where('customer_id',Auth::user()->id)->where('instrument_id',$request->id)->where('watchlist_name',$request->activeList)->with('instrument')->first();
            return $w;
            
    }

    public function removeFromWatchlist($request)
    {
        if ($request->watchlist_name && $request->instrument_id) {
            $watch_list = Watchlist::where('customer_id',Auth::user()->id)->where('instrument_id',$request->instrument_id)->where('watchlist_name',$request->watchlist_name)->first()->delete();
            return 1;
        } else {
            return 0;
        }
    }
}
