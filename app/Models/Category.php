<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    public static function insert($data)
    {
        DB::table('productcategory')->insert([
                'Name' => $data['name'],
                'Code'=> $data['code'],
            ]);
 
        return true;
    }
    
    public static function getAllProducts()
    {
        return DB::table('productcategory')->get();
    }
    public static function getById($id)
    {
        return DB::table('productcategory')->where('ProductCategoryID', $id)->first();
    }
    public static function updateCategory($productId, $data)
    {

       return DB::table('productcategory')
            ->where('ProductCategoryID', $productId)
            ->update([
                'Name' => $data['name'],
                'Code' => $data['code'],
            ]);
        // var_dump(DB::listen());die;
    }

    public static function deleteData($id)
    {
        return DB::table('product')->where('ProductID', $id)->delete();
    }
}
