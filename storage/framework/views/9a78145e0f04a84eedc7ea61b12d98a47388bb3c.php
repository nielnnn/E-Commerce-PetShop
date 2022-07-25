<?php $__env->startSection('body'); ?>
    <!-- content -->
    <div class="container mt-10">
        <div class="col-lg">
            <h1 class="pt-4 text-center">Keranjang</h1>
            <div class="card mt-4">
                <div class="card-body">
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success text-center" role="alert">
                            <strong><?php echo e(session('success')); ?></strong>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('danger')): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <strong><?php echo e(session('danger')); ?></strong>
                        </div>
                    <?php endif; ?>
                    <div class="container">
                        <h2 class="pt-4 text-start"><i class="bi bi-cart-fill"></i>Detail Pesanan</h2>
                    </div>
                    <div class="alert alert-danger mt-4" role="alert"><i class="bi bi-info-circle-fill">
                            Pastikan barang yang dipilih benar</i>
                    </div>
                    <div class="card mt-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php if(!empty($pesanan)): ?>
                                    <?php $__currentLoopData = $pesanan_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($item->produk->nama_barang); ?></td>
                                            <td><?php echo e($item->jumlah); ?></td>
                                            <td><?php echo e($item->jumlah_harga); ?></td>
                                            <td>
                                                <form action="/hapusProduk/<?php echo e($item->id); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        onclick="return confirm('Ingin hapus? <?php echo e($item->produk->nama_barang); ?>')">hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <th colspan="5" class="text-center"><a> Belum ada pilihan
                                            produk</a></th>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cotainer mt-5">
                        <?php if(!empty($pesanan)): ?>
                            <h4 class="text-end">Total Harga : <?php echo e($pesanan->total_harga); ?>,-</h4>
                            <div class="d-flex flex-row-reverse mt-5">
                                <form action="/cekout" method="POST">
                                    <?php echo method_field('put'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id_pesanan" value="<?php echo e($pesanan->id); ?>">
                                    <button class="btn btn-success btn-sm" type="submit"
                                        onclick="return confirm('Ingin Cekout?')">cekout</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <h4 class="text-end">Total Harga : 0,-</h4>
                            <div class="d-flex flex-row-reverse mt-5">
                                <form action="/keranjang" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-success btn-sm" type="submit"
                                        onclick="return confirm('Ingin Cekout?')">cekout</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.beranda', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Downloads\e-commers-sederhana-master\resources\views/keranjang.blade.php ENDPATH**/ ?>