<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/produk">Produk</a>
                </li>
                @auth('web')
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/keranjang">Keranjang</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/register">Keranjang</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth('web')
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light">{{ Auth::User()->name }}</a>
                    </li>
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light" href="/logout">logout</a>
                    </li>
                @else
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light" href="/register">Daftar</a>
                    </li>
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- end navabar -->
