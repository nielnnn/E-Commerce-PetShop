@extends('dashboard.partials.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">pelanggan detail</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h3 class="mb-3"> Data Pelanggan</h3>
                    <h6 for="status">nama : {{ $datapelanggan->name }}</h6>
                    <h6 for="status">email : {{ $datapelanggan->email }}</h6>
                    <h6 for="status">Alamat : {{ $datapelanggan->alamat }}</h6>
                    <h6 for="status">no hp : {{ $datapelanggan->nohp }}</h6>

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info card-outline">
                            <div class="container">
                                <div class="container">
                                    <h4 class="mt-5">Riwayat pesanan</h4>

                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">no</th>
                                            <th scope="col">nama barang</th>
                                            <th scope="col">jumlah</th>
                                            <th scope="col">harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($detailpesanan)
                                            @foreach ($detailpesanan as $ps)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $ps->produk->nama_barang }}</td>
                                                    <td>{{ $ps->jumlah }}</td>
                                                    <td>{{ $ps->jumlah_harga }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <th colspan="5" class="text-center">
                                                <p> Belum Membuat
                                                    Pesanan</p>
                                            </th>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    </div>
    </div>
@endsection
