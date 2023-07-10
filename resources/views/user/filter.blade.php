@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0">
            <a href="{{ route('home') }}">Home</a>
            <span class="mx-2 mb-0">/</span>
            <strong>
                <a href="{{ route('produk') }}">Shop</a>
            </strong>
            <span class="mx-2 mb-0">/</span>
            <strong class="text-black">
                {{ $cekId->name }}
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
            @foreach($item as $foods)
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
            <div class="block-4 text-center border">
                <a href="">
                    <img src="{{ asset('storage/' . $foods->gambar) }}" alt="Image placeholder" class="img-fluid" width="100%" style="height:200px">
                </a>
                <div class="block-4-text p-4">
                <h3><a href="</a></h3>
                <p class="mb-0">RP {{ $foods->price }}</p>
                <a href="{{ route('user.produk.detail', $foods->id) }}" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div>
            </div>
            @endforeach


        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-right">
            <div class="site-block-27">
            {{ $item->links() }}
            </div>
            </div>
        </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                <ul class="list-unstyled mb-0">
                @foreach($categories as $categorie)
                <li class="mb-1">
                    <a href="{{ route('produk.filter', $categorie->id) }}" class="d-flex"><span>{{ $categorie->name }}</span> <span class="text-black ml-auto">( {{ $categorie->jumlah }} )</span></a>
                </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
