<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\pesanandetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;

class dashboardcontroller extends Controller
{
    public function index()
    {
        // return 'tess';
        return view('dashboard.index', [
            'title' => 'dashboard',
            'totalProduk' => Produk::count(),
            'totalPelanggan' => User::where('level', 0)->count()
        ]);
    }

    public function dataProduk()
    {
        return view('dashboard.dataproduk');
    }

    public function dataPelanggan()
    {
        return view('dashboard.datapelanggan', [
            'title' => 'data pelanggan',
            'datapelanggan' => User::latest()->where('level', 0)->get()
        ]);
    }

    public function detailPelanggan($id)
    {
        // $l = User::findOrFail($id);
        $i = User::findOrFail($id);
        // return $i;

        $pesananpelanggan =  pesanan::where('id_user', $id)->where('status', 1)->first();

        $detailpesanan = pesanandetail::where('id_pesanan', $pesananpelanggan->id)->get();
        return view('dashboard.detailpelanggan', [
            'title' => 'detail pelanggan',
            'datapelanggan' => $i,
            'detailpesanan' => $detailpesanan
        ]);
    }
    public function editPelanggan($id)
    {
        // $l = User::findOrFail($id);
        $i = User::findOrFail($id);
        // return $i;
        return view('dashboard.editpelanggan', [
            'title' => 'edit pelanggan',
            'editpelanggan' => $i,

        ]);
    }
    public function updatePelanggan(Request $request, $id)
    {
        // return $request;
        $user = User::findOrFail($id);
        $datapelanggan = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);
        // return $request;
        $datapelanggan['email'] = $user->email;
        User::where('id', $user->id)->update($datapelanggan);
        return redirect('/datapelanggan')->with('success', 'Berhasil diubah!');
    }

    public function deletePelanggan($id)
    {
        $pelanggan = User::findOrFail($id);
        $dataPesanan = pesanan::where('id_user', $pelanggan->id)->get();
        // return $dataPesanan;
        foreach ($dataPesanan as $dp) {
            pesanandetail::where('id_pesanan', $dp->id)->delete();
        }
        pesanan::where('id_user', $pelanggan->id)->delete();
        User::where('id', $pelanggan->id)->delete();
        return redirect('/datapelanggan')->with('success', 'Berhasil dihapus!');
    }

    public function riwayat()
    {
        return view('dashboard.riwayatPembelian', [
            'title' => 'Riwayat Pembelian',
            'dataRiwayat' => pesanandetail::latest()->get()
        ]);
    }
}
