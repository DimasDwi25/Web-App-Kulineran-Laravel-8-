@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
    </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @isset($item->alamat_detail))
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 for="">Alamat Sekarang </h3><br>
                                {{ $item->alamat_detail }}
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 text-right">
                                <a href="{{ route('user.alamat.ubah', $item->id) }}" class="btn btn-primary">Ubah Alamat</a>
                        </div>
                        </div>
                    </div>
                </div>
            @endisset

            @empty($item->alamat_detail)
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.alamat.simpan') }}" method="POST">
                        @csrf
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
            @endempty
        </div>
        <div class="col-md-2"></div>
    </div>

    </div>
</div>
@endsection
@section('js')
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
@endsection
