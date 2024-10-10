<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    // protected $table = 'product'; // Ganti dengan nama tabel yang diinginkan

    public static function insert($data)
    {
        DB::table('product')->insert([
                'TokoID' => 1,
                'VariantID' => 1,
                'ProductCategoryID' => 1,
                'Name' => $data['name'],
                'Price'=> $data['price'],
                'Qty'=> $data['qty']
            ]);
 
        return true;
    }

    public static function getAllProducts()
    {
        return DB::table('product')->get();
    }
    public static function getById($id)
    {
        return DB::table('product')->where('ProductID', $id)->first();
    }

    public static function updateProduct($productId, $data)
    {

       return DB::table('product')
            ->where('ProductID', $productId)
            ->update([
                'Name' => $data['name'],
                'Price' => $data['price'],
                'Qty' => $data['qty'],
            ]);
        // var_dump(DB::listen());die;
    }

    public static function deleteData($id)
    {
        return DB::table('product')->where('ProductID', $id)->delete();
    }
}
