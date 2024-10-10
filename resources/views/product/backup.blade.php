<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form with Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Tambahkan di bagian <head> atau sebelum </body> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="{{ asset('backend/js/product.js') }}" defer></script>


    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-green-600 text-white flex flex-col">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-6">Admin Menu</h1>
                <nav>
                    <ul>
                        <li class="mb-4">
                            <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">Category</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">Variant</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">User</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold text-green-600 mb-6">Daftar Produk</h1>

            <!-- Form Input Produk -->
            <div id="productForm" class="bg-white p-8 rounded-lg shadow-lg hidden">
                <h2 class="text-xl font-bold text-green-600 mb-4">Input Product</h2>
                <form action="/product/save" method="POST">
                    @csrf

                    <!-- Input Nama -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" id="name" name="name" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>

                    <!-- Input Harga -->
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                        <input type="number" id="price" name="price" required min="0"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>

                    <!-- Input Qty -->
                    <div class="mb-6">
                        <label for="qty" class="block text-sm font-medium text-gray-700">Quantity Produk</label>
                        <input type="number" id="qty" name="qty" required min="1"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>

             <!-- Tombol Tambah untuk Menampilkan Form -->
             <button id="toggleFormButton" class="mb-4 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">
                Tambah Produk
            </button>

            <!-- Tabel Daftar Produk -->
            <div class="mt-6">
                <h2 class="text-xl font-bold text-green-600 mb-4">List Produk</h2>
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-green-600 text-white">
                            <th class="py-2 px-4">Nama Produk</th>
                            <th class="py-2 px-4">Harga Produk</th>
                            <th class="py-2 px-4">Quantity</th>
                            <th class="py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $a)
                        <!-- Contoh data, ini bisa diisi dengan data dari database -->
                        <tr>
                            <td class="border px-4 py-2">{{ $a->Name }}</td>
                            <td class="border px-4 py-2">{{ $a->Price }}</td>
                            <td class="border px-4 py-2">{{ $a->Qty }}</td>
                            <td class="border px-4 py-2"><a href="#" onclick="deleteProduct({{ $a->ProductID }}, '{{ csrf_token() }}')"> <span class="fa fa-trash text-red-500"></span></a></td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // JavaScript untuk toggle form
        document.getElementById('toggleFormButton').onclick = function() {
            const form = document.getElementById('productForm');
            form.classList.toggle('hidden');
        };
    </script>
</body>
</html>


