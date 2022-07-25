<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authcontroller extends Controller
{
    public function index()
    {
        return view('auth.index', [
            'title' => 'Login'
        ]);
    }
    public function register()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email', 'unique:users'],
            'alamat' => ['required', 'max:30'],
            'nohp' => ['required', 'min:3', 'max:20', 'unique:users'],
            'password' => ['required', 'min:5', 'max:20'],
        ]);
        $validatedData['level'] = 0;
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Berhasil daftar, silahkan login!');
    }

    public function login(Request $request)
    {
        // return $request;

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->level == 0) {
                return redirect('/');
            }
            if (Auth::user()->level == 1) {
                return redirect('/dasbor');
            }
        }
        return redirect('/login')->with('danger', 'Masukkan email dan password dengan benar!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil Logout!');
    }
}
