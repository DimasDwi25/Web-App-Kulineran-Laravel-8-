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
        <div class="col-md-12">
            <h2 class="btn btn-warning text-white">Belum Dibayar</h2>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
           <div class="table-responsive">
           <div class="table-responsive">
           <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Invoice</th>
                <th class="product-name">Total</th>
                <th class="product-price">Status</th>
                <th class="product-quantity" width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($o->invoice); ?></td>
                    <td><?php echo e($o->sub_total + $o->biaya_cod); ?></td>
                    <td><?php echo e($o->name); ?></td>
                    <td>
                    <a href="<?php echo e(route('user.order.pembayaran',$o->id)); ?>" class="btn btn-success">Bayar</a>
                    <a href="" onclick="return confirm('Yakin ingin membatalkan pesanan')" class="btn btn-danger">Batalkan</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
            </div>
           </div>

    </div>

    </div>

    <div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2 class="btn btn-warning text-white">Sedang Dalam Proses</h2>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Invoice</th>
                <th class="product-name">Total</th>
                <th class="product-price">Status</th>
                <th class="product-quantity" width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $dicek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($o->invoice); ?></td>
                    <td><?php echo e($o->sub_total + $o->biaya_cod); ?></td>
                    <td>
                        <?php if($o->name == 'Perlu Di Cek'): ?>
                        Sedang Di Cek
                        <?php else: ?>
                        <?php echo e($o->name); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                    <a href="<?php echo e(route('user.order.detail',$o->id)); ?>" class="btn btn-success">Detail</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>

    </div>

    <div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2 class="btn btn-warning text-white">Riwayat Pesanan Anda</h2>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Invoice</th>
                <th class="product-name">Total</th>
                <th class="product-price">Status</th>
                <th class="product-quantity" width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $histori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($o->invoice); ?></td>
                    <td><?php echo e($o->sub_total + $o->biaya_cod); ?></td>
                    <td><?php echo e($o->name); ?></td>
                    <td>
                    <a href="<?php echo e(route('user.order.detail',$o->id)); ?>" class="btn btn-success">Detail</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
            </div>

    </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/order/order.blade.php ENDPATH**/ ?>