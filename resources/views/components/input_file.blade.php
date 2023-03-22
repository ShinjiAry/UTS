<div class="mb-3 d-flex flex-column">
    <label for="input-file">Upload</label>
    <img src="{{url('/srcpublic/img/default.jpg')}}" alt="" class="img-input-file w-full my-2" style="max-width:300px">
    <input type="file" name='foto' class="form-control" id="input-file" onchange="previewImg(`{{'#input-file'}}`,`{{'.img-input-file'}}`);">
    @if($errors->get('foto'))
      <ul id="outlined_error_help" class="text-danger">
          @foreach($errors->get('foto') as $item)
              <li>{{$item}}</li>
          @endforeach
      </ul>
    @endif
  </div>