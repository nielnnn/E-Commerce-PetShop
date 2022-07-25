<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class produkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dataproduk', [
            'title' => 'data produk',
            'databarang' => Produk::latest()->get()

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tambahproduk', [
            'title' => 'tambah produk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $dataproduk = $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'file|max:4096',
            'harga' => 'required',
        ]);
        $request->hasFile('gambar');
        $path = storage_path('app/public/produk/');
        $file = $request->file('gambar');
        $name =  uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        $dataproduk['gambar'] = $name;
        Produk::create($dataproduk);
        return redirect('/dataproduk')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Produk = Produk::findOrFail($id);
        return view('dashboard.editproduk', [
            'title' => 'edit produk',
            'databarang' => $Produk,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $id;
        $databarang = Produk::findOrFail($id);

        $dataproduk = $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'file|max:4096',
            'harga' => 'required',
        ]);
        $deletegambar = public_path('storage/produk/' . $databarang->gambar);
        if ($request->hasfile('gambar')) {
            if (file_exists($deletegambar)) {
                unlink($deletegambar);
            }
            $request->hasFile('gambar');
            $path = storage_path('app/public/produk/');
            $file = $request->file('gambar');
            $name =  uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $name);
            $dataproduk['gambar'] = $name;
        }
        // return $dataproduk;
        Produk::where('id', $id)->update($dataproduk);
        return redirect('/dataproduk')->with('success', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapusbarang = Produk::findOrFail($id);
        $hapusgambar = public_path('storage/produk/' . $hapusbarang->gambar);
        if (file_exists($hapusgambar)) {
            unlink($hapusgambar);
        }
        Produk::where('id', $id)->delete();
        return redirect('/dataproduk')->with('success', 'barang berhasil dihapus!');
    }
}
