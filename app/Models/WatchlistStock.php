<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchlistStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'watchlist_id',
        'symbol'
    ];

    public function watchlist()
    {
        return $this->belongsTo(Watchlist::class);
    }
}
