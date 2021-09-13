<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Pesanan </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Detail Pesanan <?php echo e($order->nama_pelanggan); ?></h4>
                      </div>
                      <div class="col text-right">
                      <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
                      </div>
                    </div>
                    <hr>
                   <div class="row">
                   <div class="col-md-7">
                    <table>
                        <tr>
                            <td>No Invoice</td>
                            <td>:</td>
                            <td  class="p-2"><?php echo e($order->invoice); ?></td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>:</td>
                            <td  class="p-2"><?php echo e($order->metode_pembayaran); ?></td>
                        </tr>
                        <?php if($order->metode_pembayaran == 'cod'): ?>
                        <tr>
                            <td>Biaya Cod</td>
                            <td>:</td>
                            <td  class="p-2"><?php echo e($order->biaya_cod); ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td>Status Pesanan</td>
                            <td>:</td>
                            <td  class="p-2"><?php echo e($order->status); ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:</td>
                            <td  class="p-2">Rp. <?php echo e(number_format($order->sub_total,2,',','.')); ?> ( belum Termasuk Ongkir )</td>
                        </tr>
                        <tr>
                            <td>Biaya Ongkir</td>
                            <td>:</td>
                            <td  class="p-2">Rp. <?php echo e(number_format($order->ongkir,2,',','.')); ?></td>
                        </tr>
                        <tr>
                            <td>Kurir</td>
                            <td>:</td>
                            <td  class="p-2">JNE Service OKE</td>
                        </tr>
                        <?php if($order->no_resi != null): ?>
                        <tr>
                            <td>No Resi</td>
                            <td>:</td>
                            <td  class="p-2"><?php echo e($order->no_resi); ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td>No Hp</td>
                            <td>:</td>
                            <td  class="p-2"><?php echo e($order->no_hp); ?></td>
                        </tr>
                        <tr>
                            <td>Catatan Pelanggan</td>
                            <td>:</td>
                            <td  class="p-2"><?php echo e($order->pesan); ?></td>
                        </tr>
                        <?php if($order->bukti_pembayaran != null): ?>
                        <tr>
                            <td>Bukti Pembayaran</td>
                            <td>:</td>
                            <td  class="p-2"><img src="<?php echo e(asset('storage/'.$order->bukti_pembayaran)); ?>" alt="" srcset="" class="img-fluid" width="300"></td>
                        </tr>
                        <?php if($order->status_order_id == 2): ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td  class="p-2"><a href="<?php echo e(route('admin.transaksi.konfirmasi',$order->id)); ?>" onclick="return confirm('Yakin ingin mengonfirmasi pesanan ini?')" class="btn btn-primary mt-1">Konfirmasi Telah Bayar</a><br>
                            <small>Klik tombol ini jika pembeli sudah terbukti melakukan pembayaran</small>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if($order->status_order_id == 3): ?>
                        <tr>
                            <td>No Resi</td>
                            <td>:</td>
                            <td  class="p-2">
                            <form action="<?php echo e(route('admin.transaksi.inputresi',$order->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                            <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Input Resi" aria-label="Recipient's username" aria-describedby="basic-addon2" name="no_resi" required>
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary" type="button">Simpan</button>
                                </div>
                            </div>
                            </div>
                            </form>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    </div>
                    <div class="col-md-5">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" >
                        <thead class="bg-primary text-white">
                          <tr>
                            <th width="5%">No</th>
                            <th>Nama Produk</th>
                            <th>QTY</th>
                            <th>Total Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($dt->nama_produk); ?></td>
                                <td><?php echo e($dt->quantity); ?></td>
                                <td><?php echo e($dt->quantity * $dt->price); ?></td>
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
          </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/admin/transaksi/detail.blade.php ENDPATH**/ ?>