@extends('layouts.index')

@section('title', 'Product List')

@section('content')
<div class="flex-1 p-6">
    <h1 class="text-2xl font-bold text-green-600 mb-6">Daftar Category</h1>

    <!-- Form Input Produk -->
    <div id="productForm" class="bg-white p-8 rounded-lg shadow-lg hidden">
        <h2 class="text-xl font-bold text-green-600 mb-4">Input Category</h2>
        <form action="/category/save" method="POST" id="form">
            @csrf
            <input type="hidden" name="productcategoryid">
            <!-- Input Nama -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Code</label>
                <input type="text" id="code" name="code" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>

            <!-- Input Harga -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" required min="0"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-center">
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">
                    Simpan
                </button>
            </div>
        </form>
    </div>

        <!-- Tombol Tambah untuk Menampilkan Form -->
    <button id="toggleFormButton" data-trigger="tambah" class="mb-4 mt-4 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">
        Tambah
    </button>

    <!-- Tabel Daftar Produk -->
    <div class="mt-6">
        <h2 class="text-xl font-bold text-green-600 mb-4">List Category</h2>
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="py-2 px-4">Code</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($category) > 0)
                    @foreach($category as $a)
                    <!-- Contoh data, ini bisa diisi dengan data dari database -->
                        <tr>
                            <td class="border px-4 py-2">{{ $a->Code }}</td>
                            <td class="border px-4 py-2">{{ $a->Name }}</td>
                            <td class="border px-4 py-2">
                                <a href="#" onclick="deleteCategory({{ $a->ProductCategoryID }}, '{{ csrf_token() }}')"> <span class="fa fa-trash text-red-500"></span></a>
                                <a href="#" onclick="edit({{ $a->ProductCategoryID }}, '{{ csrf_token() }}')"><span class="fas fa-edit"></span></a>
                            </td>
                        
                        </tr>
                    @endforeach
               @else
               <tr>
                   <td class="border px-4 py-2" rowspan="4">Tidak Ada Data</td>
              @endif
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('backend/js/productcategory.js') }}" defer></script>

@endsection

