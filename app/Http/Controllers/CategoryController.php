<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::getAllProducts();
        return view("category.index",compact('category'));
    }

    public function save(Request $request)
    {
        // Validasi input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'required|numeric|min:0',
        // ]);

        if ($request->productcategoryid == '') {
            $product = Category::insert($request->all());
            return redirect()->route('category.index')
            ->with('success', 'Category created successfully.');
        } else {
            // Jika productId ada, jalankan update
            $result = Category::updateCategory($request->productcategoryid, $request->all());
            return redirect()->route('category.index')
            ->with('success', 'Category update successfully.');
        }
    }
    // Fungsi untuk update produk
    public function edit(Request $request, $id)
    {
        $product = Category::getById($id);

        // Periksa apakah produk ditemukan
        if ($product) {
            return response()->json([
                'message' => 'Category found',
                'product' => $product
            ], 200);
        } else {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }

        
    }

    // Fungsi untuk menghapus produk
    public function delete($id)
    {
        $product = Category::deleteData($id);
        if ($product) {
            return redirect()->back()->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete Category.');
        }
    }
}
