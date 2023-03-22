<div class="mb-3">
  <label for="input-file">deskripsi Produk</label>
  <textarea class="form-control" placeholder="Leave a comment here" id="editorCkeditor" name="deskripsi">{{old($error_name, '') ? old($error_name, '') : $another_old_input }}</textarea>
</div>
@if($errors->get($error_name))
 <div id="validation{{$name}}Feedback" class="invalid-feedback">
   <ul>
    @foreach($errors->get($error_name) as $item)
      <li>{{$item}}</li>
     @endforeach
   </ul>
 </div>
@endif

<!-- ck editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create( document.querySelector( '#editorCkeditor' ) )
    .catch( error => {
        console.error( error );
    } );
</script>