<?php $__env->startSection('body'); ?>
    <div class="container pt-5">
        <div class="col-lg">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title">PetsQu Shop</h5>
                            <p class="card-text">Menjual Berbagai Makanan Kucing</p>
                        </div>
                        <div class="col-lg-4 text-center">
                            <img src="images/kucing.png" class="card-img-top" alt="..." style="width:100px;height:100px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- content -->
        <div class="row">
            <?php if($produk->count()): ?>
                <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4">
                        <div class="card mt-4">
                            <img src="<?php echo e('/storage/produk/' . $pd->gambar); ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <p class="card-text"><?php echo e($pd->nama_barang); ?></p>
                                <p class="card-text">Rp. <?php echo e($pd->harga); ?>,-</p>
                                <div class="d-grid gap-2">
                                    <a href="/produkDetail/<?php echo e($pd->id); ?>" class="btn btn-primary">
                                        <i class="bi bi-cart"></i> Pilih
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <h1 class="text-center mt-5">Belum ada produk</h1>
            <?php endif; ?>
        </div>
    </div>

    <!-- end content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.beranda', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Downloads\e-commers-sederhana-master\resources\views/produk.blade.php ENDPATH**/ ?>