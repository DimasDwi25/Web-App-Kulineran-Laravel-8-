<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Kategori </h3>
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
                      <h4 class="card-title">Data Produk</h4>
                      </div>
                      <div class="col text-right">
                      <a href="<?php echo e(route('admin.foods.tambah')); ?>" class="btn btn-primary">Tambah</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" id="table">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th width="15%">Aksi</th>
                              </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td align="center"></td>
                                    <td><?php echo e($foods->name); ?></td>
                                    <td><?php echo e($foods->price); ?></td>
                                    <td><?php echo e($foods->categories->name); ?></td>
                                    <td><img src="<?php echo e(asset('storage/'.$foods->gambar)); ?>" alt="" ></td>
                                    <td align="center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="<?php echo e(route('admin.foods.edit', $foods->id)); ?>" class="btn btn-warning btn-sm">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.foods.destroy', $foods->id)); ?>" onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </a>
                                    </div>
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
          </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/admin/foods/index.blade.php ENDPATH**/ ?>