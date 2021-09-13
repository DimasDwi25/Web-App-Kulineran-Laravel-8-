<?php $__env->startSection('content'); ?>
<div class="site-blocks-cover" style="background-image: url(<?php echo e(asset('shopper')); ?>/images/background-hero.jpg);" data-aos="fade">
    <div class="container">
    <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
        <h1 class="mb-2">Cari dan pesan kuliner favorit kalian disini</h1>
        <div class="intro-text text-center text-md-left">
            <p class="mb-4">Berbagai menu tersedia disini</p>
            <p>
            <a href="<?php echo e(route('produk')); ?>" class="btn btn-sm btn-primary">Pesan Sekarang</a>
            </p>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
        <div class="icon mr-4 align-self-start">
            <span class="icon-truck"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Pengiriman</h2>
            <p>Pengiriman saat ini hanya bisa untuk lokal saja</p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
        <div class="icon mr-4 align-self-start">
            <span class="icon-star"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Berbagai kuliner daerah</h2>
            <p>Berbagai macam kuliner bisa kalian temui disini</p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
        <div class="icon mr-4 align-self-start">
            <span class="icon-security"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Praktis</h2>
            <p>Kalian hanya perlu memesan dan kami akan langsung mengirim ke alamat tujuan</p>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2 bg-light"  data-aos="fade-up">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Produk Terlaris</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <?php if(count($item)): ?>
        <div class="nonloop-block-3 owl-carousel" >
            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                <div class="block-4 text-center">
                    <a href="">
                    <figure class="block-4-image">
                    <img src="<?php echo e(asset('storage/'.$items->gambar)); ?>" alt="Image placeholder" class="img-fluid" width="100%" style="height:300px">
                    </figure>
                    </a>
                    <div class="block-4-text p-4">
                    <h3><a href=""><?php echo e($items->name); ?></a></h3>
                    <p class="mb-0"><?php echo e($items->price); ?></p>
                    <a href="<?php echo e(route('user.produk.detail', $items->id)); ?>" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
            <h4 style="text-align: center">Data sedang tidak ada</h2>
        <?php endif; ?>
        </div>
    </div>
    </div>
</div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/welcome.blade.php ENDPATH**/ ?>