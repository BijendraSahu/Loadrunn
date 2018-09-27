<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeemRequest extends Model
{
    protected $table = 'redeem_request';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\UserMaster', 'user_id');
    }
}
