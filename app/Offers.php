<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = 'tbl_offers';
    public $timestamps = false;
    protected $primaryKey = 'offer_id';

    public function category()
    {
        return $this->belongsTo('App\Category', 'offer_cab');
    }
}
