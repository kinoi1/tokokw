<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Main extends Model
{
   
    public static function getAllProductCategory()
    {
        return DB::table('productcategory')->get();
    }
}
