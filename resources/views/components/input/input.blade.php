<div class="col-md-6">
  <label for="validation{{$name}}" class="form-label">{{$title}}</label>
  <input type="{{$type}}" class="form-control {{ $errors->get($name) ? 'is-invalid' : ' '}}" id="validation{{$name}}" aria-describedby="validation{{$name}}Feedback" name="{{$name}}" placeholder="" value="{{old($error_name, '') ? old($error_name, '') : $another_old_input }}" >
  @if($errors->get($error_name))
   <div id="validation{{$name}}Feedback" class="invalid-feedback">
     <ul>
      @foreach($errors->get($error_name) as $item)
        <li>{{$item}}</li>
       @endforeach
     </ul>
   </div>
  @endif
</div>

