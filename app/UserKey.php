<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserKey extends Model
{
    protected $table = 'users_key';
    public $timestamps = false;

    public static function checkKey($username)
    {
        $user = UserKey::where(['key_name' => $username])->first();
        if (is_null($user)) return true;
        else return false;
    }

    public
    function scopegetKeyDropdown()
    {
        $roles = UserKey::where(['is_active' => '1'])->where('franchise_id', '=', null)->get(['id', 'key_name']);
        $arr[0] = "SELECT";
        foreach ($roles as $role) {
            $arr[$role->id] = $role->key_name;
        }
        return $arr;
    }

    public function franchise()
    {
        return $this->belongsTo('App\AdminModel', 'franchise_id');
    }
}
