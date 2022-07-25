@extends('dashboard.partials.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="card text-bg-danger mb-3">
                    <div class="card-header">{{ $totalProduk }} Produk</div>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="card text-bg-danger mb-3">
                    <div class="card-header">{{ $totalPelanggan }} Pelanggan</div>
                </div>

            </div>
        </div>
        </div>
    </main>
@endsection
