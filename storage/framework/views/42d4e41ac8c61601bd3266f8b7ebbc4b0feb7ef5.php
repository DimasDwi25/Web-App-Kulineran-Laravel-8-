<?php $__env->startSection('content'); ?>

<style>
    html {
        font-size: 14px;
    }

    @media (min-width: 768px) {
        html {
            font-size: 16px;
        }
    }

    .container {
        max-width: 960px;
    }

    .pricing-header {
        max-width: 700px;
    }

    .card-deck .card {
        min-width: 220px;
    }

    .border-top {
        border-top: 1px solid #e5e5e5;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e5e5;
    }

    .box-shadow {
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
    }

</style>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Lvl Midtrans</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="https://jurnalmms.web.id/">Blog</a>
        <a class="p-2 text-dark" href="https://github.com/mulyosyahidin">GitHub</a>
        <a class="p-2 text-dark" href="https://instagram.com/mul.yoo">Instagram</a>
    </nav>
</div>

<div class="container pb-5 pt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                        <thead class="thead-light">
                            <th scope="col">#</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>#<?php echo e($order->invoice); ?></td>
                                    <td><?php echo e(number_format($order->total_price, 2, ',', '.')); ?></td>
                                    <td>
                                        <?php if($order->payment_status == 1): ?>
                                            Menunggu Pembayaran
                                        <?php elseif($order->payment_status == 2): ?>
                                            Sudah Dibayar
                                        <?php else: ?>
                                            Kadaluarsa
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn btn-success">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/order/midtrans/index.blade.php ENDPATH**/ ?>