<?php $__env->startSection('content'); ?>
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <span class="mx-2 mb-0">/</span>
            <strong>
                <a href="<?php echo e(route('produk')); ?>">Shop</a>
            </strong>
            <span class="mx-2 mb-0">/</span>
            <strong class="text-black">
                <?php echo e($cekId->name); ?>

            </strong>
        </div>
    </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

    <div class="row mb-5">
        <div class="col-md-9 order-2">

        <div class="row mb-5">
            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
            <div class="block-4 text-center border">
                <a href="">
                    <img src="<?php echo e(asset('storage/' . $foods->gambar)); ?>" alt="Image placeholder" class="img-fluid" width="100%" style="height:200px">
                </a>
                <div class="block-4-text p-4">
                <h3><a href="</a></h3>
                <p class="mb-0">RP <?php echo e($foods->price); ?></p>
                <a href="<?php echo e(route('user.produk.detail', $foods->id)); ?>" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-right">
            <div class="site-block-27">
            <?php echo e($item->links()); ?>

            </div>
            </div>
        </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                <ul class="list-unstyled mb-0">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="mb-1">
                    <a href="<?php echo e(route('produk.filter', $categorie->id)); ?>" class="d-flex"><span><?php echo e($categorie->name); ?></span> <span class="text-black ml-auto">( <?php echo e($categorie->jumlah); ?> )</span></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/filter.blade.php ENDPATH**/ ?>