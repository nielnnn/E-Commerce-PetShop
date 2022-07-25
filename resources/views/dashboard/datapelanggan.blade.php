@extends('dashboard.partials.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data pelanggan</h1>
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
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">no</th>
                                        <th scope="col">nama pelanggan</th>
                                        <th scope="col">alamat</th>
                                        <th scope="col">ho hp</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datapelanggan as $dp)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dp->name }}</td>
                                            <td>{{ $dp->alamat }}</td>
                                            <td>{{ $dp->nohp }}</td>
                                            <td>
                                                {{-- <a class="btn btn-primary text-white"
                                                    href="/datapelanggan/{{ $dp->id }}">view</a> --}}
                                                <a class="btn btn-warning text-white"
                                                    href="/datapelanggan/{{ $dp->id }}">edit</a>
                                                <form action="/hapuspelanggan/{{ $dp->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger text-white"
                                                        onclick="return confirm('Anda yakin ingin hapus?')"
                                                        type="submit">hapus</button>
                                                </form>
                                            </td>
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
