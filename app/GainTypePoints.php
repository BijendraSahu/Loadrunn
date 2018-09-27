<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GainTypePoints extends Model
{
    protected $table = 'gain_type_points';
    public $timestamps = false;

    public static function get_gain_type_points($user_id, $gain_type)
    {
        $gain_type_point = GainTypePoints::where(['gain_type' => $gain_type])->first();
        $user = UserMaster::find($user_id);
        $user->points += $gain_type_point->points;
        $user->save();
    }
}
