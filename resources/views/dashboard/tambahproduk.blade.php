@extends('dashboard.partials.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah produk</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="content mt-5">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="/dataproduk" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1"
                                placeholder="barang 1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga</label>
                            <input type="number" name="harga" min="1" class="form-control"
                                id="exampleFormControlInput1" placeholder="Rp.100000">
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input name="gambar" class="form-control" type="file" id="formFile">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Tambah Produk</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
    </div>
    </div>
@endsection
