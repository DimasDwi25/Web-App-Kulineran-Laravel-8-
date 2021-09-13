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
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php if(count($item)): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 for="">Alamat Sekarang </h3><br>
                                <?php echo e($item[0]->alamat_detail); ?>

                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 text-right">
                                <a href="<?php echo e(route('user.alamat.ubah', $item[0]->id)); ?>" class="btn btn-primary">Ubah Alamat</a>
                        </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('user.alamat.simpan')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="form-grup">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" name="alamat_detail" id="" placeholde="Kecamatan/Desa/Nama Jalan" class="form-control">
                            </select>
                            </div>
                            <div class="mt-4 text-right">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-2"></div>
    </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
var toHtml = (tag, value) => {
	$(tag).html(value);
	}
 $(document).ready(function() {
    //  $('#province_id').select2();
    //  $('#cities_id').select2();
     $('#province_id').on('change',function(){
     var id = $('#province_id').val();
     var url = window.location.href;
     var urlNya = url.substring(0, url.lastIndexOf('/alamat/'));
     $.ajax({
         type:'GET',
         url:urlNya + '/getcity/' + id,
         dataType:'json',
         success:function(data){
            var op = '<option value="">Pilih Kota</option>';
            if(data.length > 0) {
			var i = 0;
			for(i = 0; i < data.length; i++) {
				op += `<option value="${data[i].city_id}">${data[i].title}</option>`
			}
		    }
            toHtml('[name="cities_id"]', op);
         }
     })
     })
 });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Laravel\Kulineran\resources\views/user/alamat.blade.php ENDPATH**/ ?>