<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admin_master';
    public $timestamps = false;

    public static function checkUsername($username)
    {
        $user = AdminModel::where(['is_active' => 1, 'username' => $username])->first();
        if (is_null($user)) return true;
        else return false;
    }

    public
    function scopegetFranchiseDropdown()
    {
        $roles = AdminModel::where(['is_active' => '1'])->where('id', '>', 1)->get(['id', 'name']);
        $arr[0] = "SELECT";
        foreach ($roles as $role) {
            $arr[$role->id] = $role->name;
        }
        return $arr;
    }

}
