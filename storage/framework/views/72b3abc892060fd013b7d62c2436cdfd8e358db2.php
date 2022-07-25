<?php $__env->startSection('body'); ?>
    <!-- content -->
    <div class="container mt-20">
        <div class="col-lg-4 offset-lg-4">
            <div class="card mt-4">
                <div class="card-body bg-info bg-gradient bg-opacity-50">
                    <div class="container">
                        <h2 class="pt-4 text-center mb-5">Login</h2>
                    </div>
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
                    <form action="/authLogin" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="col-lg mt-2">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-lg mt-2">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password">
                        </div>
                        <div class="cotainer mt-5">
                            <div class="d-flex justify-content-center mt-5">
                                <button class="btn btn-success bg-gradient opacity-75" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.beranda', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Downloads\e-commers-sederhana-master\resources\views/auth/index.blade.php ENDPATH**/ ?>