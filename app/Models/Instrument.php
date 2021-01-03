<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;
    protected $fillable = [
        'instrument_name', 'exchange', 'short_id', 'cmp', 'open','high','low','close'];
}
