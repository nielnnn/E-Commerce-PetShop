<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanandetail;
use App\Models\pesanan;
use App\Models\Produk;
use Detailpesanan;
use Illuminate\Support\Facades\Auth;

class pelanggancontroller extends Controller
{
    public function inputjml(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        // return $produk;
        // $dataJml = $request->validate([
        //     'jumlah' => 'required'
        // ]);
        $cek_pesanan = pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        if (empty($cek_pesanan)) {
            $pesanan = new pesanan;
            $pesanan->id_user = Auth::user()->id;
            $pesanan->total_jumlah = 0;
            $pesanan->total_harga = 0;
            $pesanan->status = 0;
            $pesanan->save();
        }
        $pesanan_baru = pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $cek_pesanan_detail = pesanandetail::where('id_barang', $produk->id)->where('id_pesanan', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new pesanandetail;
            $pesanan_detail->id_barang = $request->id;
            $pesanan_detail->id_pesanan = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah;
            $pesanan_detail->jumlah_harga = $produk->harga * $request->jumlah;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = pesanandetail::where('id_barang', $produk->id)->where('id_pesanan', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah;

            $harga_pesanan_detail_baru = $produk->harga * $request->jumlah;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        $pesanan_detail_lama = pesanandetail::where('id_pesanan', $pesanan_baru->id)->sum('jumlah');
        $pesanan = pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $pesanan->total_jumlah =  $pesanan_detail_lama;
        $pesanan->total_harga = $pesanan->total_harga + $produk->harga * $request->jumlah;
        $pesanan->update();
        return redirect('/keranjang')->with('success', 'Barang berhasil ditambahkan');
    }

    public function deleteItem($id)
    {
        $pesanandetail = pesanandetail::findOrFail($id);
        $pesanan =  pesanan::findOrFail($pesanandetail->id_pesanan);
        $jml = $pesanan->total_jumlah - $pesanandetail->jumlah;
        $jmlHarga = $pesanan->total_harga - $pesanandetail->jumlah_harga;
        $updateData['total_jumlah'] = $jml;
        $updateData['total_harga'] =  $jmlHarga;
        pesanan::where('id', $pesanandetail->id_pesanan)->update($updateData);
        pesanandetail::where('id', $id)->delete();

        return redirect('/keranjang')->with('success', 'Data berhasil di hapus!');
    }

    public function cekOut(Request $request)
    {
        // return $request;
        $pesanan = pesanan::findOrFail($request->id_pesanan);
        $pesanan->status = 1;
        $pesanan->update();
        return redirect('/keranjang')->with('success', 'Berhasil Cekout!');
    }
}
