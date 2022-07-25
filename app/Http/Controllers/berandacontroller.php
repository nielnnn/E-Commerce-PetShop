<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanandetail;
use App\Models\pesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class berandacontroller extends Controller
{
    public function index()
    {
        // $a = Produk::all();
        // return $a;
        return view('index', [
            'title' => 'Beranda',
            'produk' => Produk::latest()->get()
        ]);
    }

    public function produk()
    {
        return view('produk', [
            'title' => 'Produk',
            'produk' => Produk::latest()->get()
        ]);
    }

    public function produkdetail($id)
    {
        $dataProduk = Produk::findOrFail($id);

        return view('produkdetail', [
            'title' => 'Produk Detail',
            'produkdetail' => $dataProduk
        ]);
    }

    public function keranjang()
    {
        $pesanan = pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        // return $pesanan;
        $title = 'keranjang';
        if (!empty($pesanan)) {
            $pesanan_detail = pesanandetail::where('id_pesanan', $pesanan->id)->get();
            return view('keranjang', compact('pesanan', 'pesanan_detail', 'title'));
        }
        return view('keranjang', compact('pesanan', 'title'));
    }
}
