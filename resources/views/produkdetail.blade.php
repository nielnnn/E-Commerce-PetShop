@extends('partials.beranda')
@section('body')
    <!-- content -->
    <div class="container mt-10">
        <div class="col-lg">
            <h1 class="pt-4 text-center">Detail Produk</h1>
            <div class="card mt-10">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ '/storage/produk/' . $produkdetail->gambar }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produkdetail->nama_barang }}</h5>
                            <p class="card-text">Rp. {{ $produkdetail->harga }},-</p>
                        </div>
                        <div class="row mb-3 mt-10 justify-content-auto">
                            @auth('web')
                                <form action="/inputJumlah/{{ $produkdetail->id }}" method="POST">
                                    @csrf
                                    <div class="col-lg-4">
                                        {{-- <input type="hidden" name="id" class="form-control"
                                            value="{{ $produkdetail->id }}"> --}}
                                        <input type="number" required name="jumlah" class="form-control"
                                            placeholder="Masukkan jumlah">
                                    </div>
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-success">Masukkan Keranjang</button>
                                        {{-- <a href="/keranjang" class="btn btn-success">Masukkan Keranjang</a> --}}
                                    </div>
                                </form>
                            @else
                                <div class="col-lg-4">
                                    <a href="/register" class="btn btn-success">Masukkan Keranjang</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
