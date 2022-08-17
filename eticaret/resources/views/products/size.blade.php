@foreach($sizes as $val)
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="id_size{{$val->size}}" name="size">
        <label class="custom-control-label" for="id_size{{$val->size}}">{{$val->size}}</label>
    </div>
@endforeach
