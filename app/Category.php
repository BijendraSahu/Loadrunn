<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_category';
    public $timestamps = false;
    protected $primaryKey = 'category_id';

    public
    function scopegetCategoryDropdown()
    {
        $roles = Category::where(['category_status' => '1'])->get(['category_id', 'category_name']);
        $arr[0] = "SELECT";
        foreach ($roles as $role) {
            $arr[$role->category_id] = $role->category_name;
        }
        return $arr;
    }
}
