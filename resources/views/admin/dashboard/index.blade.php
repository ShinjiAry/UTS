@extends('admin.template')

@section('css')
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@endsection

@section('isi_konten')
<!-- tabel brok -->
<table class="table" id="table_id">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">nama</th>
      <th scope="col">telp</th>
      <th scope="col">harga</th>
      <th scope="col">foto</th>
      <th scope="col">Aksi</th>

    </tr>
  </thead>
  <tbody>
    @for ($i = 0; $i < count ($Menu); $i++) 

    <tr>
      <th scope="row">{{$i + 1}}</th>
      <td>{{$Menu[$i]->nama}}</td>
      <td>{{$Menu[$i]->telp}}</td>
      <td>{{$Menu[$i]->harga}}</td>
      <td>{{$Menu[$i]->foto}}</td>
      <td class="d-flex gap-2">
        <a href="<?= route('admin.product.detail', ['id' => $Menu[$i]->id] ); ?>" type="button" class="btn btn-primary">Detail</a>
        <a href="<?= route('admin.product.update.index', ['id' => $Menu[$i]->id] ); ?>" type="button" class="btn btn-warning">Update</a>
        <form action="/admin/produk/hapus" method="POST">
          @csrf
          <input type="hidden" value="<?= $Menu[$i]->id ?>" name="id">
          <button onclick="return confirm('yakin data di hapus?')" type="submit" class="btn btn-danger">Hapus</button> 
        </form>
      </td>
    </tr>
    @endfor
  </tbody>
</table> 
@endsection

@section('js')
  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- datatables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } )
  </script>
@endsection