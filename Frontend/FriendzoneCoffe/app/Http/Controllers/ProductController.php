<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil data produk dari API
        $productResponse = Http::get('http://localhost:8999/api/products');
        $products = $productResponse->json();

        // Mengambil data kategori dari API
        $categoryResponse = Http::get('http://localhost:9000/api/category');
        $categories = $categoryResponse->json();

        // Mengirimkan data produk dan kategori ke tampilan
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {

        // Mengambil data kategori dari API
        $categoryResponse = Http::get('http://localhost:9000/api/category');
        $categories = $categoryResponse->json();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $imageUrl = '/storage/' . $imagePath;

        $response = Http::post('http://localhost:8999/api/products', [
            'name' => $request->name,
            'description' => $request->description,
            'price' => intval($request->price), // Mengonversi ke bilangan bulat
            'stock' =>  intval($request->stock),
            'image' => $imageUrl,
            'category_id' =>  intval($request->category_id),
        ]);


        if ($response->successful()) {
            return redirect()->route('products.index');
        }

        return back()->with('error', 'Failed to create product.');
    }


    public function show($id)
    {
        $response = Http::get('http://localhost:8999/api/products/' . $id);
        $product = $response->json();

        $categoryResponse = Http::get('http://localhost:9000/api/category');
        $categories = $categoryResponse->json();

        return view('admin.products.show', compact('product', 'categories'));
    }

    public function edit($id)
    {
        $response = Http::get('http://localhost:8999/api/products/' . $id);
        $product = $response->json();

        $responseCategories = Http::get('http://localhost:9000/api/category');
        $categories = $responseCategories->json();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|min:3|max:255',
        'description' => 'required|min:3',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Menghapus required agar tidak wajib untuk mengunggah gambar saat edit
        'category_id' => 'required|numeric',
    ]);
    $imageUrl = $request->input('current_image');


    // Memeriksa apakah ada file gambar yang diunggah
    if ($request->hasFile('image')) {
        // Mengunggah gambar baru
        $imagePath = $request->file('image')->store('images', 'public');
        $imageUrl = '/storage/' . $imagePath;
   
    }

    // Mengirimkan permintaan HTTP ke endpoint yang sesuai untuk pembaruan data produk
    $response = Http::put('http://localhost:8999/api/products/' . $id, [
        'id' => (int)$id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => intval($request->price),
        'stock' => intval($request->stock),
        'image' => $imageUrl,
        'category_id' => intval($request->category_id),
    ]);
    if ($response->successful()) {
        return redirect()->route('products.index');
    }

    return back()->with('error', 'Failed to update product.');
}

    public function destroy($id)    
    {
        $response = Http::delete('http://localhost:8999/api/products/' . $id);
        return redirect()->route('products.index');
    }
}
