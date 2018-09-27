<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    protected $table = 'tbl_rates';
    public $timestamps = false;
    protected $primaryKey = 'rates_id';

    public function category()
    {
        return $this->belongsTo('App\Category', 'rates_cab');
    }
}
