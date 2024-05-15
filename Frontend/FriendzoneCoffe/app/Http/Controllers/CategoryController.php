<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:9000/api/category');
        $categories = $response->json();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $imageUrl = '/storage/' . $imagePath;
        }

        Http::post('http://localhost:9000/api/category', [
            'name' => $request->name,
            'image' => $imageUrl,
        ]);

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $response = Http::get("http://localhost:9000/api/category/$id");
        $category = $response->json();
        return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $response = Http::get("http://localhost:9000/api/category/$id");
        $category = $response->json();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageUrl = $request->input('current_image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $imageUrl = '/storage/' . $imagePath;
        }

        Http::put("http://localhost:9000/api/category/$id", [
            'name' => $request->name,
            'image' => $imageUrl,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Http::delete("http://localhost:9000/api/category/$id");
        return redirect()->route('categories.index');
    }
}




