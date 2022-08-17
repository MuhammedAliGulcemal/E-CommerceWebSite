<div class="container-fluid py-5">
    @foreach($product as $val)
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="/storage/image/productimages/{{$val->image}}" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$val->product_name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        {{view("/products/point",array("point"=>$product_point[0]))}}
                    </div>
                    <small class="pt-1">({{$product_point[1]}} Yorum)</small>
                </div>
                <form method="post" action="{{route("musteri-add-product")}}" class="tm-edit-product-form"
                      enctype="multipart/form-data">
                    @csrf
                    <h3 class="font-weight-semi-bold mb-4">{{$val->price}}₺</h3>
                    <div class="d-flex mb-2">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Renk:</p>

                            @foreach($properties as $prop)
                                @if($val->id === $prop->product_id)
                                    @if($prop->color != null)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio"
                                                   class="custom-control-input" id="id_color{{$prop->id}}" name="color"
                                                   value="{{$prop->color}}"
                                                   checked>
                                            <label class="custom-control-label"
                                                   for="id_color{{$prop->id}}">{{$prop->color}}</label>
                                        </div>
                                    @endif
                                @endif
                            @endforeach

                    </div>
                    <div class="d-flex mb-2">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Beden:</p>

                            @foreach($properties as $prop)
                                @if($val->id === $prop->product_id)
                                    @if($prop->size != null)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="id_size{{$prop->id}}"
                                                   name="size" value="{{$prop->size}}" checked>
                                            <label class="custom-control-label"
                                                   for="id_size{{$prop->id}}">{{$prop->size}}</label>
                                        </div>
                                    @endif
                                @endif
                            @endforeach

                    </div>
                    <div class="d-flex align-items-center mb-2 pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Mevcut Adet: {{$val->count}}</p>
                    </div>
                    <input type="hidden" name="product_id" value="{{$val->id}}">
                    <div class="d-flex align-items-center mb-2 pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Adet:</p>
                        <div class="input-group quantity mr-3" style="width: 70px;">
                            <input id="id_quantity" name="count" type="number" min="1" max="{{$val->count}}"
                                   class="form-control form-control-sm bg-secondary text-center"
                                   value="1">
                        </div>
                        <button class="btn btn-primary px-3"><i
                                class="fa fa-shopping-cart mr-1"></i>Sepete Ekle
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>
<div class="row px-xl-5">
    <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Açıklama</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Yorumlar</a>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tab-pane-1">
                <h4 class="mb-3">Ürün Açıklaması</h4>
                <p>{{$val->details}}</p>
            </div>
            <div class="tab-pane fade" id="tab-pane-2">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4">"{{$val->product_name}}" için yorumlar</h4>
                        @foreach($comments as $value)
                            @if($val->id === $value->product_id)
                                @foreach($users as $user)
                                    @if($user->id === $value->user_id)
                                        <div class="media mb-4">
                                            <div class="media-body">
                                                <h6>{{$user->name}}<small> -
                                                        <i>{{$value->created_at}}</i></small>
                                                </h6>
                                                {{view("/products/point",array("point"=>$value->point))}}
                                                <p>{{$value->comment}}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Yorum yap</h4>
                        <small>Emailiniz gizli kalacaktır. Gerekli alanlar * ile işaretlenmiştir</small>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Puanınız * :</p>
                            <div class="text-primary">
                                <a onclick="setStar(1)" id="id_firststar" class="far fa-star"></a>
                                <a onclick="setStar(2)" id="id_secondstar" class="far fa-star"></a>
                                <a onclick="setStar(3)" id="id_thirdstar" class="far fa-star"></a>
                                <a onclick="setStar(4)" id="id_forthstar" class="far fa-star"></a>
                                <a onclick="setStar(5)" id="id_fifthstar" class="far fa-star"></a>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="id_comment">Yorumunuz *</label>
                                <textarea id="id_comment" cols="30" rows="5"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">İsminiz</label>
                                <input type="text" class="form-control" id="name"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Emailiniz</label>
                                <input type="email" class="form-control" id="email"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                       readonly>
                            </div>
                            <div class="form-group mb-0">
                                <input onclick="makeComment({{$val->id}})" type="submit"
                                       value="Yorumu Gönder" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<script>
    var _point;
    function makeComment(_product_id) {
        if (confirm("Yorumunuzu onaylıyor musunuz?")) {
            $.ajax({
                url: "{{route("musteri-yorum-yap")}}",
                type: "post",
                data: {
                    _token: "{{csrf_token()}}",
                    comment: $("#id_comment").val(),
                    product_id: _product_id,
                    point: _point,
                },
                success: function (data) {
                    if (data.result) {
                        alert("Yorumunuz başarıyla oluşturuldu!");
                    } else {
                        alert("Bir sorun oluştu!");
                    }
                }
            });
        }
    }

    function setStar(number) {
        _point = number;
        // alert(number);
        // document.getElementById("id_firststar").classList.remove("far fa-star");
        // document.getElementById("id_secondstar").classList.remove("far fa-star");
        // document.getElementById("id_thirdstar").classList.remove("far fa-star");
        // document.getElementById("id_forthstar").classList.remove("far fa-star");
        // document.getElementById("id_fifthstar").classList.remove("far fa-star");
        // if (number === 1) {
        //     document.getElementById("id_firststar").classList.add("fas fa-star");
        //     document.getElementById("id_secondstar").classList.add("far fa-star");
        //     document.getElementById("id_thirdstar").classList.add("far fa-star");
        //     document.getElementById("id_forthstar").classList.add("far fa-star");
        //     document.getElementById("id_fifthstar").classList.add("far fa-star");
        // }
        // if (number === 2) {
        //     document.getElementById("id_firststar").classList.add("fas fa-star");
        //     document.getElementById("id_secondstar").classList.add("fas fa-star");
        //     document.getElementById("id_thirdstar").classList.add("far fa-star");
        //     document.getElementById("id_forthstar").classList.add("far fa-star");
        //     document.getElementById("id_fifthstar").classList.add("far fa-star");
        // }
        // if (number === 3) {
        //     document.getElementById("id_firststar").classList.add("fas fa-star");
        //     document.getElementById("id_secondstar").classList.add("fas fa-star");
        //     document.getElementById("id_thirdstar").classList.add("fas fa-star");
        //     document.getElementById("id_forthstar").classList.add("far fa-star");
        //     document.getElementById("id_fifthstar").classList.add("far fa-star");
        // }
        // if (number === 4) {
        //     document.getElementById("id_firststar").classList.add("fas fa-star");
        //     document.getElementById("id_secondstar").classList.add("fas fa-star");
        //     document.getElementById("id_thirdstar").classList.add("fas fa-star");
        //     document.getElementById("id_forthstar").classList.add("fas fa-star");
        //     document.getElementById("id_fifthstar").classList.add("far fa-star");
        // }
        // if (number === 5) {
        //     document.getElementById("id_firststar").classList.add("fas fa-star");
        //     document.getElementById("id_secondstar").classList.add("fas fa-star");
        //     document.getElementById("id_thirdstar").classList.add("fas fa-star");
        //     document.getElementById("id_forthstar").classList.add("fas fa-star");
        //     document.getElementById("id_fifthstar").classList.add("fas fa-star");
        // }
        // window.location.reload();
    }

    function buyProduct(id) {
        if (confirm("Sepete eklemeyi onaylıyor musunuz?")) {
            $.ajax({
                url: "{{route("musteri-add-product")}}",
                type: "post",
                data: {
                    _token: "{{csrf_token()}}",
                    product_id: id,
                    count: $("#id_quantity").val()
                },
                success: function (data) {
                    if (data.result) {
                        alert("Ekleme başarılı!");
                    } else {
                        alert("Bir sorun oluştu!");
                    }
                }
            });
        }
    }
</script>
