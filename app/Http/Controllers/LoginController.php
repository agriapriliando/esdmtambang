<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $datalogin = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        try {
            $response = Http::timeout(10)->post('https://dev.ditaria.com/api/login', $datalogin);
        } catch (\Exception $e) {
            return redirect('login')->with('error', 'Koneksi ke Aplikasi MINERS');
        }
        $response = json_decode($response, true);
        if (array_key_exists('user', $response)) {
            if ($response['user']['role'] != 'pemohon' || $response['user']['role'] != 'newuser') { //admin evaluator
                $user = User::updateOrCreate(
                    ['email' => $response['user']['email']],
                    [
                        'name' => $response['user']['name'],
                        'username' => $response['user']['username'],
                        'nohp' => $response['user']['nohp'],
                        'password' => bcrypt('123'),
                        'email' => $response['user']['email'],
                        'role' => $response['user']['role'],
                    ]
                );
                // dd($response['user']);
                Auth::attempt(['email' => $response['user']['email'], 'password' => '123']);
                // dd(Auth::user()->name);
                session()->put('token', $response['token']);
                session()->put('user', $response['user']);
                return redirect()->route('berkas')->with('success', 'Hai ' . session('user')['name']);
            } else {
                return redirect('login')->with('error', 'Akun anda bukan Admin MINERS');
            }
        } else {
            return redirect('login')->with('error', $response['message']);
        }
    }
}
