@extends('partials.beranda')
@section('body')
    <!-- content -->
    <div class="container mt-10">
        <div class="col-lg">
            <h1 class="pt-4 text-center">Keranjang</h1>
            <div class="card mt-4">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('danger'))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>{{ session('danger') }}</strong>
                        </div>
                    @endif
                    <div class="container">
                        <h2 class="pt-4 text-start"><i class="bi bi-cart-fill"></i>Detail Pesanan</h2>
                    </div>
                    <div class="alert alert-danger mt-4" role="alert"><i class="bi bi-info-circle-fill">
                            Pastikan barang yang dipilih benar</i>
                    </div>
                    <div class="card mt-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @if (!empty($pesanan))
                                    @foreach ($pesanan_detail as $item)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item->produk->nama_barang }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->jumlah_harga }}</td>
                                            <td>
                                                <form action="/hapusProduk/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        onclick="return confirm('Ingin hapus? {{ $item->produk->nama_barang }}')">hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <th colspan="5" class="text-center"><a> Belum ada pilihan
                                            produk</a></th>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="cotainer mt-5">
                        @if (!empty($pesanan))
                            <h4 class="text-end">Total Harga : {{ $pesanan->total_harga }},-</h4>
                            <div class="d-flex flex-row-reverse mt-5">
                                <form action="/cekout" method="POST">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="id_pesanan" value="{{ $pesanan->id }}">
                                    <button class="btn btn-success btn-sm" type="submit"
                                        onclick="return confirm('Ingin Cekout?')">cekout</button>
                                </form>
                            </div>
                        @else
                            <h4 class="text-end">Total Harga : 0,-</h4>
                            <div class="d-flex flex-row-reverse mt-5">
                                <form action="/keranjang" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm" type="submit"
                                        onclick="return confirm('Ingin Cekout?')">cekout</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end content -->
@endsection
