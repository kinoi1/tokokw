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
        // $Data =array(
        //     "Data" => $products
        // );
        return view("form",compact('products'));
    }

    // Fungsi untuk menampilkan produk berdasarkan ID
    public function list_data($id)
    {
        // $product = Product::findOrFail($id);
        return response()->json();
    }

    // Fungsi untuk update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validasi input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'required|numeric|min:0',
        // ]);

        // Update produk di database
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
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

            $product = Product::insert($request->all());
            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product
            ], 201);
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
