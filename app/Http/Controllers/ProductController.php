<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAllProducts();
        return view("product.index",compact('products'));
    }

    // Fungsi untuk menampilkan produk berdasarkan ID
    public function list_data($id)
    {
        // $product = Product::findOrFail($id);
        return response()->json();
    }

    // Fungsi untuk update produk
    public function edit(Request $request, $id)
    {
        $product = Product::getById($id);

        // Periksa apakah produk ditemukan
        if ($product) {
            return response()->json([
                'message' => 'Product found',
                'product' => $product
            ], 200);
        } else {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        
    }

    
    // Fungsi untuk menyimpan data produk baru
    public function save(Request $request)
    {
        // Validasi input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'required|numeric|min:0',
        // ]);
        if ($request->productid == '') {
            $product = Product::insert($request->all());
            return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
        } else {
            // Jika productId ada, jalankan update
            $result = Product::updateProduct($request->productid, $request->all());
            return redirect()->route('product.index')
            ->with('success', 'Product update successfully.');
        }
    }

    // Fungsi untuk menghapus produk
    public function delete($id)
    {
        $product = Product::deleteData($id);
        if ($product) {
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete product.');
        }
    }
}
