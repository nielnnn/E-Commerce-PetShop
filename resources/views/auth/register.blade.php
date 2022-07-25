@extends('partials.beranda')
@section('body')
    <!-- content -->
    <div class="container mt-20">
        <div class="col-lg-4 offset-lg-4">
            <div class="card mt-4">
                <div class="card-body bg-info bg-gradient bg-opacity-50">
                    <div class="container">
                        <h2 class="pt-4 text-center mb-5">Register</h2>
                    </div>
                    <form action="/daftar" method="POST">
                        @csrf
                        <div class="col-lg mt-2">
                            <input type="text" id="inputPassword5" name="name" class="form-control"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="col-lg mt-2">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-lg mt-2">
                            <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                        </div>
                        <div class="col-lg mt-2">
                            <input type="number" id="inputPassword5" name="nohp" class="form-control"
                                placeholder="No. HP">
                        </div>
                        <div class="col-lg mt-2">
                            <input type="password" id="password1" name="password1" class="form-control"
                                placeholder="Password">
                        </div>
                        <div class="col-lg mt-2">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password Konfirmasi">
                        </div>
                        <div class="cotainer mt-5">
                            <div class="d-flex justify-content-center mt-5">
                                <button class="btn btn-success bg-gradient opacity-75" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- end content -->
