<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MejaController extends Controller
{
    public function index()
    {
        // Mengambil data meja dari API
        $mejaResponse = Http::get('http://localhost:8992/api/mejas');
        $mejas = $mejaResponse->json();

        return view('admin.mejas.index', compact('mejas'));
    }

    public function create()
    {
        return view('admin.mejas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:255',
            'status' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:6048',
            'deskripsi' => 'required',
        ]);

        $imagePath = $request->file('gambar')->store('gambar', 'public');
        $imageUrl = '/storage/' . $imagePath;

        $response = Http::post('http://localhost:8992/api/mejas', [
            'nama' => $request->nama,
            'status' => $request->status,
            'gambar' => $imageUrl,
            'deskripsi' => $request->deskripsi,
        ]);
        if ($response->successful()) {
            return redirect()->route('mejas.index')->with('success', 'Meja created successfully.');
        } else {
            return back()->withErrors(['error' => 'Failed to create Meja.']);
        }
    }
    public function show($id)
    {
        $response = Http::get("http://localhost:8992/api/mejas/{$id}");
        $meja = $response->json();
        return view('admin.mejas.show', compact('meja'));
    }

    public function edit($id)
    {
        $response = Http::get("http://localhost:8992/api/mejas/{$id}");
        $meja = $response->json();
        return view('admin.mejas.edit', compact('meja'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3|max:255',
            'status' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:6048',
            'deskripsi' => 'required',
        ]);

        $imageUrl = $request->input('current_image');

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('gambar', 'public');
            $imageUrl = '/storage/' . $imagePath;
        }

        $response = Http::put("http://localhost:8992/api/mejas/{$id}", [
            'id' => (int)$id,
            'nama' => $request->nama,
            'status' => $request->status,
            'gambar' => $imageUrl,
            'deskripsi' => $request->deskripsi,
        ]);
        
        

        if ($response->successful()) {
            return redirect()->route('mejas.index')->with('success', 'Meja updated successfully.');
        } else {
            return back()->withErrors(['error' => 'Failed to update Meja.']);
        }
    }


    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8992/api/mejas/{$id}");
        if ($response->successful()) {
            return redirect()->route('mejas.index')->with('success', 'Meja deleted successfully.');
        } else {
            return back()->withErrors(['error' => 'Failed to delete Meja.']);
        }
    }
}
