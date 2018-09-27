<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_category';
    public $timestamps = false;
    protected $primaryKey = 'category_id';
}
