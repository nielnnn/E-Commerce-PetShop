<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Catsqu</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dasbor*') ? 'active' : '' }}" aria-current="page"
                            href="/dasbor">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dataproduk*') ? 'active' : '' }}" href="/dataproduk">
                            <span data-feather="file"></span>
                            Data produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('datapelanggan*') ? 'active' : '' }}" href="/datapelanggan">
                            <span data-feather="file"></span>
                            Data pelanggan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('riwayatPembelian*') ? 'active' : '' }}"
                            href="/riwayatPembelian">
                            <span data-feather="file"></span>
                            Riwayat Pembelian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <span data-feather="file"></span>
                            logout
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

    </div>
</div>
