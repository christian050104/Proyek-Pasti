<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserMejaController extends Controller
{
    public function index()
    {
        $mejaResponse = Http::get('http://localhost:8992/api/mejas');
        $mejas = $mejaResponse->json();

        return view('customer.mejas.index', compact('mejas'));
    }

  
}
