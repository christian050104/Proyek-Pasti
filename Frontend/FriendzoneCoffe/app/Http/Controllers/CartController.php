<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cartResponse = Http::get("http://localhost:8082/api/carts?user_id={$userId}");

        if ($cartResponse->successful()) {
            $carts = $cartResponse->json();
            // Ensure $carts is an array
            if (!is_array($carts)) {
                $carts = [];
            }
        } else {
            // Handle the case when the API request fails
            $carts = [];
            Log::error('Failed to fetch cart data', [
                'user_id' => $userId,
                'response' => $cartResponse->body()
            ]);
        }

        return view('customer.carts.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'product_id' => 'required|numeric',
            'product_image' => 'required|string',
            'product_name' => 'required|string|min:3|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $response = Http::post('http://localhost:8082/api/carts', [
            'product_id' => $request->product_id,
            'product_image' => $request->product_image,
            'product_name' => $request->product_name,
            'quantity' => intval($request->quantity),
            'price' => intval($request->price),
            'total' => intval($request->total),
            'user_id' => $userId,
        ]);

        if ($response->successful()) {
            return redirect()->route('carts.index');
        }

        return back()->with('error', 'Failed to add to cart.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|numeric',
        ]);

        $response = Http::put("http://localhost:8082/api/carts/{$id}", [
            'quantity' => intval($request->quantity),
        ]);

        if ($response->successful()) {
            return redirect()->route('carts.index');
        }

        return back()->with('error', 'Failed to update cart.');
    }

    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8082/api/carts/{$id}");
        
        if ($response->successful()) {
            return redirect()->route('carts.index');
        }

        return back()->with('error', 'Failed to delete cart item.');
    }
}
