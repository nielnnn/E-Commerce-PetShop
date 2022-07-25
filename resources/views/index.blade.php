@extends('partials.beranda')
@section('body')
    <div class="container pt-5">
        <!-- carousel -->
        <div id="carouselExampleIndicators" class="carousel slide pt-5" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/home/images/banner1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/home/images/benner2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/home/images/banner3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- end carousel  -->


        <!-- content -->
        <div class="row">
            <h1 class="pt-4">Produk Terbaru</h1>
            @if ($produk->count())
                @foreach ($produk as $pd)
                    <div class="col-lg-4">
                        <div class="card mt-4">
                            <img src="{{ '/storage/produk/' . $pd->gambar }}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <p class="card-text">{{ $pd->nama_barang }}</p>
                                <p class="card-text">Rp. {{ $pd->harga }},-</p>
                                <div class="d-grid gap-2">
                                    <a href="/produkDetail/{{ $pd->id }}" class="btn btn-primary">
                                        <i class="bi bi-cart"></i> Pilih
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1 class="text-center mt-5">Belum ada produk</h1>
            @endif
        </div>
    </div>

    <!-- end content -->
@endsection
