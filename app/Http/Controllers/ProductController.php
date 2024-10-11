<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    protected $main;

    // Model di-inject melalui constructor
    public function __construct(Main $main)
    {
        $this->main = $main;
    }

    public function index()
    {
        $products = Product::getAllProducts();
        $category = $this->main->getAllProductCategory();
        return view("product.index",compact('products','category'));
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
        // $request->validate([
            // 'name' => 'required|string|max:255',
            // 'price' => 'required|numeric|min:0',
            // 'qty' => 'required|integer|min:1',
            // 'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi gambar
        // ]);
        if ($request->hasFile('gambar')) {
            // Simpan file gambar dan ambil path-nya
            $imagePath = $request->file('gambar')->store('gambar', 'public'); // Folder "product_images" di storage/public
            $request->merge(['imagepath' => $imagePath]);
        } else {
            $imagePath = null; // Jika tidak ada gambar, set null
        }

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
