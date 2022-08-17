@foreach($category as $val)
    <a href="{{route("urun-kategori-getir",$val->name)}}"  class="nav-item nav-link">{{$val->name}}</a>
@endforeach
