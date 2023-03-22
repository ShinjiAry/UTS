@extends('public.template')

@section('css')
    <link rel="stylesheet" href="{{url('srcpublic/css/index.css')}}">
@endsection

@section('content')
    <!-- banner -->
    <section class="container ">
        <div class="row banner">
        <div class="col-lg-6 col-12">
            <h1>Sofa Ekslusif, <br> Memberikan Kesan Mewah</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quae architecto error ut! Totam ratione cumque
            corporis illo placeat molestiae.</p>
            <button type="submit" class="btn btn-outline-dark">CONTACT US</button>
        </div>
        <div class="col-lg-6 col-12">
            <img src="/srcpublic/img/p-1.png" alt="">
        </div>
        </div>
    </section>
    <!-- promo -->
    <section class="container">
        <div class="row promo">
        <div class="col-lg-6 col-12">
            <h2>DISCOUNT</h2>
            <h3 class="ms-4 d-flex align-items-center">Up To <span style="font-size:5rem;" class="text-danger">60%</span> <span>This Season</span></h3>
        </div>
        <div class="col-lg-6 col-12">
            <img src="/srcpublic/img/p-2.png" alt="">
        </div>
        </div>
    </section>
    <!-- product -->
    <section class="container product">
        <!-- title -->
        <div>
        <h2>Our Product</h2>
        <div class="line"></div>
        </div>
        <!-- items -->
        <div class="items row">
            @foreach($products as $product)
                <!-- card -->
                <a href="{{route('detail', ['id' => $product->id])}}" class="item col-lg-3 col-md-4 col-sm-6 col-12" style="text-decoration:none; color:black">
                    <div class="bg-img">
                        <div class="img" style="background-image: url('/storage/product/<?= $product->foto ?>');"></div>
                    </div>
                    <div class="row align-items-start">
                        <!-- description -->
                        <div class="col-lg-6 col-12">
                            <h6>{{$product->nama}}</h6>
                        </div>
                        <div class="col-lg-6 col-12 justify-content-end d-flex">
                            <h4 class="m-0">{{$product->harga}}</h4>
                        </div>
                    </div>
                    <div class="px-2">{!!substr($product->deskripsi,0,100)!!}</div>
                </a>
            @endforeach
        </div>
        <button class="btn btn-outline-dark">Produk Lainnya...</button>
    </section>
@endsection

@section('js')

@endsection