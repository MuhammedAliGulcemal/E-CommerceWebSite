<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @foreach($category as $value)
            <div class="col-lg-2 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">{{$value->totalcount}} Ürün</p>
                    <a href="{{route("urun-kategori-getir",$value->name)}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img style="height: 200px" class="img-fluid"
                             src="/storage/image/categoryimages/{{$value->image}}" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{$value->name}}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>


