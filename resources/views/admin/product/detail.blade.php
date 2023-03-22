@extends('admin.template')

@section('isi_konten')
<div class="card" style="width: 18rem;">
  <img src="{{url('/storage/product/' . $item->foto)}}" class="card-img-top" alt='{{$item->foto}}'>
  <div class="card-body">
    <h5 class="card-title"><?= $item->nama ?></h5>
    <p class="card-text">ini produk</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">harga:<?= $item->harga ?></li>
    <li class="list-group-item">telp:<?= $item->telp ?></li>
    <li class="list-group-item"><?= $item->deskripsi ?></li>
  </ul>
</div>
@endsection