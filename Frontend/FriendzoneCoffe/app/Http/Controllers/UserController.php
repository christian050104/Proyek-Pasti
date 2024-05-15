<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil data produk dari API
        $response = Http::get('http://localhost:8999/api/products');
        $products = $response->json();

        // Menampilkan data produk ke halaman tampilan pengguna (user)
        return view('customer.products.index', compact('products'));
    }
}
