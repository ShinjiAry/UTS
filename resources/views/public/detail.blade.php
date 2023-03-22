@extends('public.template')

@section('css')
    <link rel="stylesheet" href="{{url('srcpublic/css/detail.css')}}">
@endsection

@section('content')
<main class="container">
    <!-- main -->
    <div class="main row mt-5">
        <div class="col-lg-6 col-12">
            <img src="/storage/product/<?= $product->foto ?>" alt="" class="rounded">
        </div>
        <div class="col-lg-6 col-12">
            <h2>{{$product->nama}}</h2>
            <p>Harga : {{$product->harga}}</p>
            <p>Type : Chair, Sofa</p>
            <div class="line"></div>
            <div>
                {!!$product->deskripsi!!}
            </div>
            <div class="line"></div>
            <p>Contact : {{$product->telp}}</p>
        </div>
        </div>
        <!-- items -->
        <div class="items row">
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
        </div>
        @endforeach
    </div>
    <button class="btn btn-outline-dark button mt-2 mb-5 m-auto d-flex">Produk Lainnya...</button>
</main>
@endsection

@section('js')

@endsection