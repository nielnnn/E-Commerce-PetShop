@extends('dashboard.partials.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">edit produk</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="content mt-5">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="/dataproduk/{{ $databarang->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1"
                                value="{{ old('nama_barang', $databarang->nama_barang) }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga</label>
                            <input type="number" name="harga" min="1" class="form-control"
                                id="exampleFormControlInput1" value="{{ old('harga', $databarang->harga) }}">
                        </div>
                        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImage()"
                            value="{{ $databarang->gambar }}">
                        @if ($databarang->gambar)
                            <img src="{{ '/storage/produk/' . $databarang->gambar }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">edit Produk</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
    </div>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
