@extends('dashboard.partials.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Riwayat Pembelian</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="container">
                            <div class="container">
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">no</th>
                                        <th scope="col">nama barang</th>
                                        <th scope="col">jumlah barang</th>
                                        <th scope="col">harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataRiwayat as $db)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $db->produk->nama_barang }}</td>
                                            <td>{{ $db->jumlah }}</td>
                                            <td>{{ $db->jumlah_harga }}</td>
                                        </tr>
                                    @endforeach
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
