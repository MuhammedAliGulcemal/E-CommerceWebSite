<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Ürün Düzenle</h2>
                    </div>
                </div>
                <form method="post" action="{{route("yonetici-update-product")}}" class="tm-edit-product-form"
                      enctype="multipart/form-data">
                    <input hidden name="id" value="{{$product->id}}">
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="id_product_name">Ürün Adı
                                    </label>
                                    <input id="id_product_name" name="product_name" type="text" class="form-control validate"
                                           required="" value="{{$product->product_name}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="id_product_details">Açıklama</label>
                                    <textarea id="id_product_details" class="form-control validate" rows="3"
                                              required="" name="details">{{$product->details}}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="id_product_category">Kategori</label>
                                    <select name="category" class="custom-select tm-select-accounts" id="id_product_category">
                                        @foreach($categories as $val)
                                            @if($product->category == $val->id)
                                                <option value="{{$val->id}}" selected>{{$val->name}}</option>
                                            @else
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="id_product_price">Fiyatı
                                        </label>
                                        <input id="id_product_price" name="price" type="number"
                                               class="form-control validate"
                                               required="" value="{{$product->price}}">
                                    </div>
                                </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <img width="400" src="/storage/image/productimages/{{$product->image}}" alt="">
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input name="image" type="file" class="btn btn-primary btn-block mx-auto"
                                       value="GÖRSEL EKLE">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-block text-uppercase">Ürünü
                                Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    {{--function updateProduct() {--}}
    {{--    _price = $("#id_product_price").val();--}}
    {{--    _details = $("#id_product_details").val();--}}
    {{--    _category = $("#id_product_category").val();--}}
    {{--    if (_count < 0) {--}}
    {{--        _count = 0;--}}
    {{--    }--}}
    {{--    if (_price < 0) {--}}
    {{--        _price = 0;--}}
    {{--    }--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route("yonetici-update-product")}}",--}}
    {{--        type: "put",--}}
    {{--        data: {--}}
    {{--            _token: "{{csrf_token()}}",--}}
    {{--            update_id: {{$product->id}},--}}
    {{--            update_product_name: $("#id_product_name").val(),--}}
    {{--            update_details: _details,--}}
    {{--            update_price: _price,--}}
    {{--            update_category: _category--}}
    {{--        },--}}
    {{--        success: function (data) {--}}
    {{--            if (data.result) {--}}
    {{--                alert("Güncelleme başarılı!");--}}
    {{--            } else {--}}
    {{--                alert("Bir sorun oluştu!");--}}
    {{--            }--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}
</script>

