@extends('dashboard.partials.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">edit data pelanggan</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>
        <br>
        <br>
        <div class="content mt-3">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="/updatepelanggan/{{ $editpelanggan->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama pelanggan</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="nama pelanggan" name="name"
                                value="{{ old('name', $editpelanggan->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="email@gmail.com" readonly value="{{ old('email', $editpelanggan->email) }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"
                                value="{{ old('alamat', $editpelanggan->alamat) }}">{{ $editpelanggan->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No HP</label>
                            <input type="number" min="0" name="nohp" class="form-control"
                                id="exampleFormControlInput1" placeholder="no hp pelanggan"
                                value="{{ old('alamat', $editpelanggan->nohp) }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">edit data pelanggan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
    </div>
    </div>
@endsection
