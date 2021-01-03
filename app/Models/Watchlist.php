<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    protected $with = ['memberFeature'];

    protected $fillable = [
        'customer_id', 'watchlist_name', 'instrument_id'];

    public function instrument()
    {
        return $this->hasOne('App\Models\Instrument', 'instrument_id');
    }

    public function addToWatchlist($request)
    {
        if ($request->customer_id && $request->watchlist_name && $request->instrument_id) {
            $w = new Watchlist;
            $w->customer_id = $request->customer_id;
            $w->watchlist_name = $request->watchlist_name;
            $w->instrument_id = $request->instrument_id;
            $w->save();
            return $w;
        } else {
            return 0;
        }
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
