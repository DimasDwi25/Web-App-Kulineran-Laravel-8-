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
            <h2 class="display-5">Detail Pesanan Anda</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col-md-8">
                    <table>
                        <tr>
                            <th>No Invoice</th>
                            <td>:</td>
                            <td><?php echo e($order->invoice); ?></td>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <td>:</td>
                            <td><?php echo e($order->no_resi); ?></td>
                        </tr>
                        <tr>
                            <th>Status Pesanan</th>
                            <td>:</td>
                            <td><?php echo e($order->status); ?></td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td>:</td>
                            <td>
                            <?php if($order->metode_pembayaran == 'transfer'): ?>
                                Transfer Bank
                            <?php else: ?>
                                COD
                            <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Pembayaran</th>
                            <td>:</td>
                            <td>Rp. <?php echo e(number_format($order->sub_total + $order->biaya_cod,2,',','.')); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4 text-right">
                    <?php if($order->status_order_id == 4): ?>
                    <a href="<?php echo e(route('user.order.pesananditerima',$order->id)); ?>" onclik="return confirm('Yakin ingin melanjutkan ?')" class="btn btn-primary">Pesanan Di Terima</a><br>
                    <small>Jika pesanan belum datang harap jangan tekan tombol ini</small>
                    <?php endif; ?>
                </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th class="product-thumbnail">Gambar</th>
                            <th class="product-name">Nama Produk</th>
                            <th class="product-price">Jumlah</th>
                            <th class="product-quantity" width="20%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(asset('storage/'.$o->gambar)); ?>" alt="" srcset="" width="50"></td>
                                <td><?php echo e($o->nama_produk); ?></td>
                                <td><?php echo e($o->quantity); ?></td>
                                <td><?php echo e($o->quantity * $o->price); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        </table>

                </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/order/detail.blade.php ENDPATH**/ ?>