<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $with = ['instrument', 'user'];

    protected $fillable = [
        'user_id', 'instrument_id','qty', 'price', 'ordered_at', 'executed_at', 'type', 'status'];

    public function instrument()
    {
        return $this->hasOne('App\Models\Instrument', 'id', 'instrument_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
