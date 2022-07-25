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
                <?php if(auth()->guard('web')->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/keranjang">Keranjang</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/register">Keranjang</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if(auth()->guard('web')->check()): ?>
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light"><?php echo e(Auth::User()->name); ?></a>
                    </li>
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light" href="/logout">logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light" href="/register">Daftar</a>
                    </li>
                    <li class="nav-item justify-content-end">
                        <a class="nav-link text-light" href="/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- end navabar -->
<?php /**PATH C:\Users\Lenovo\Downloads\e-commers-sederhana-master\resources\views/partials/navbar.blade.php ENDPATH**/ ?>