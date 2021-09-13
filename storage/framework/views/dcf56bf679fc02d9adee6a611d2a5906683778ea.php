<?php $__env->startSection('content'); ?>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo e(route('home')); ?>">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <form action="<?php echo e(route('user.order.simpan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php $sub_total=0;?>
                      <?php $__currentLoopData = $keranjangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keranjang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($keranjang->nama_produk); ?> <strong class="mx-2">x</strong> <?php echo e($keranjang->quantity); ?></td>
                        <?php
                          $total = $keranjang->price * $keranjang->quantity;
                          $sub_total = $sub_total + $total;
                      ?>
                        <td>Rp. <?php echo e(number_format($total,2,',','.')); ?></td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                        <td class="text-black font-weight-bold"><strong>Jumlah Pembayaran</strong></td>
                        <td class="text-black font-weight-bold">
                        <?php $alltotal = $sub_total ; ?>
                        <strong>Rp. <?php echo e(number_format($alltotal,2,',','.')); ?></strong></td>
                      </tr>
                      <tr>
                      <td>Alamat Penerima</td>
                      <td><?php echo e($alamat->alamat_detail); ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="form-group">
                    <label for="">Catatan</label>
                    <textarea name="pesan" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">No telepon yang bisa dihubungi</label>
                    <input type="text" name="no_hp" id="" class="form-control">
                  </div>
                  <input type="hidden" name="invoice" value="<?php echo e($invoice); ?>">
                  <input type="hidden" name="sub_total" value="<?php echo e($alltotal); ?>">
                  <input type="hidden" name="ongkir" value="<?php echo e($ongkir); ?>">
                  <div class="form-group">
                  <label for="">Pilih Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="" class="form-control">
                      <option value="trf">Transfer</option>
                      <option value="cod">Cod</option>
                    </select>
                    <small>Jika memilih cod maka akan dikenakan biaya tambahan sebesar Rp. 10.000,00</small>
                  </div>


                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Pesan Sekarang</button>
                    <small>Mohon periksa alamat penerima dengan benar agar tidak terjadi salah pengiriman</small>
                  </div>
                </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/checkout.blade.php ENDPATH**/ ?>