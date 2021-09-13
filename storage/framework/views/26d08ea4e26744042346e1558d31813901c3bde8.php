<?php $__env->startSection('content'); ?>
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="<?php echo e(route('home')); ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
    </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h2 class="display-5">Silahkan Lakukan Pembayaran Lewat No Rekening Berikut</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  mb-2 text-center">
                        <?php $__currentLoopData = $rekening; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                        <div class="card text-white bg-info mb-3 " style="max-width: 18rem;">
                        <div class="card-header"><?php echo e($key->nama_bank); ?></div>
                        <div class="card-body">
                        <h5 class="card-title"><?php echo e($key->no_rekening); ?></h5>
                        <p class="card-text">Atas Nama <?php echo e($key->name); ?></p>
                        </div>
                        </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row  mb-4">
                        <div class="col-md-12 text-center">
                            Transfer Sebesar Rp <?php echo e(number_format($order->sub_total,2,',','.')); ?> Ke No Rekening Di Atas
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="<?php echo e(route('user.order.kirimbukti',$order->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="form-group">
                            <label for="">Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" id="" class="form-control" required>
                            </div>
                            <div class="text-right">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/order/pembayaran.blade.php ENDPATH**/ ?>