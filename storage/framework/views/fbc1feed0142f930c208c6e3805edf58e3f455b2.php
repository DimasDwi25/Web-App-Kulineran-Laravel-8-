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
    <div class="row mb-5">
        <form class="col-md-12" method="post" action="<?php echo e(route('user.keranjang.update')); ?>">
        <?php echo csrf_field(); ?>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Gambar</th>
                <th class="product-name">Produk</th>
                <th class="product-price">Harga</th>
                <th class="product-quantity">Jumlah</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                <td class="product-thumbnail">
                    <img src="<?php echo e(asset('storage/'.$keranjang->gambar)); ?>" alt="Image" class="img-fluid" width="150">
                </td>
                <td class="product-name">
                    <h2 class="h5 text-black"><?php echo e($keranjang->nama_produk); ?></h2>
                </td>
                <td>Rp. <?php echo e(number_format($keranjang->price,2,',','.')); ?> </td>
                <td>
                    <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="hidden" name="id[]" value="<?php echo e($keranjang->id); ?>">
                    <input type="text" name="quantity[]" class="form-control text-center" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?php echo e($keranjang->quantity); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                    </div>

                </td>
                <?php
                    $total = $keranjang->price * $keranjang->quantity;
                    $subtotal = $subtotal + $total;
                ?>
                <td>Rp. <?php echo e(number_format($total,2,',','.')); ?></td>
                <td><a href="<?php echo e(route('user.keranjang.destroy', $keranjang->id)); ?>" class="btn btn-primary btn-sm">X</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>

    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
            <button type="submit" class="btn btn-primary btn-sm btn-block">Update Keranjang</button>
            </div>
            </form>
        </div>
        </div>
        <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
            <div class="col-md-7">
            <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Total Belanja</h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">Rp. <?php echo e(number_format($subtotal,2,',','.')); ?></strong>
                </div>
            </div>

            <div class="row">

                <?php if(isset($cek_alamat)): ?>
                <div class="col-md-12">
                    <a href="<?php echo e(route('user.checkout')); ?>" class="btn btn-primary btn-lg py-3 btn-block" >Checkout</a>
                    <small>Jika Merubah Quantity Pada Keranjang Maka Klik Update Keranjang Dulu Sebelum Melakukan Checkout</small>
                </div>
                <?php endif; ?>

                <?php if(empty($cek_alamat)): ?>
                <div class="col-md-12">
                    <a href="<?php echo e(route('user.alamat')); ?>" class="btn btn-primary btn-lg py-3 btn-block" >Atur Alamat</a>
                    <small>Anda Belum Mengatur Alamat</small>
                </div>
                <?php endif; ?>

            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/keranjang.blade.php ENDPATH**/ ?>