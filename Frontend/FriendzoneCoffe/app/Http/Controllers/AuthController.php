<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $response = Http::post('http://localhost:9090/api/auth/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $responseData = $response->json();
            if (isset($responseData['status']) && $responseData['status'] === true) {
                $data = $responseData['data'];

                $token = $data['token'];
                // Simpan token ke session atau cookies
                session()->put('token', $token);

                if ($data['role'] === 'admin') {
                    return view('admin.web.dashboard');
                } else {
                    return view('customer.web.dashboard');
                }
            } else {
                return back()->withErrors(['login' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            // Menangani kesalahan jika respons tidak aktif atau gagal
            Log::error('Failed to login: ' . $e->getMessage());
            return back()->withErrors(['login' => 'Failed to login. Please try again later.']);
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::post('http://localhost:9090/api/auth/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() === 201) {
            return redirect()->route('login')->with('success', 'Registration successful, please login.');
        } else {
            return back()->withErrors(['register' => 'Registration failed.'])->withInput();
        }
    }
    public function logout()
    {
        // Hapus token dari session atau cookies
        session()->forget('token');
    
        // Simpan pesan sukses di sesi
        session()->flash('success', 'Logged out successfully.');
    
        // Alihkan pengguna ke route '/'
        return redirect('/');
    }
}
