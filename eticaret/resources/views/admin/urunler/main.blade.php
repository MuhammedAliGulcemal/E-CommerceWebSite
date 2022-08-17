<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Ürün Ekle</h2>
                    </div>
                </div>
                <form method="post" action="{{route("yonetici-create-product")}}" class="tm-edit-product-form"
                      enctype="multipart/form-data">
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="id_product_name">Ürün Adı
                                </label>
                                <input id="id_product_name" name="product_name" type="text"
                                       class="form-control validate"
                                       required="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_details">Açıklama</label>
                                <textarea id="id_details" class="form-control validate" rows="3" required=""
                                          name="details"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_category">Kategori</label>
                                <select class="custom-select tm-select-accounts" id="id_category" name="category">
                                    @foreach($categories as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_price">Fiyatı
                                </label>
                                <input id="id_price" name="price" type="number" class="form-control validate"
                                       required="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="custom-file mt-3 mb-3">
                                <input name="image" type="file" class="btn btn-primary btn-block mx-auto"
                                       value="GÖRSEL EKLE">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-block text-uppercase">Ürünü Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    {{--function metod() {--}}
    {{--    var _product_name = $("#id_product_name").val();--}}
    {{--    var _count = $("#id_count").val();--}}
    {{--    var _details = $("#id_details").val();--}}
    {{--    var _image = $("#id_image").val();--}}
    {{--    var _price = $("#id_price").val();--}}
    {{--    var _category = $("#id_category").val();--}}
    {{--    alert(_image);--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route("yonetici-create-product")}}",--}}
    {{--        type: "post",--}}
    {{--        data: {--}}
    {{--            product_name: _product_name,--}}
    {{--            image: _image,--}}
    {{--            count: _count,--}}
    {{--            price: _price,--}}
    {{--            category: _category,--}}
    {{--            details: _details,--}}
    {{--            _token: "{{csrf_token()}}"--}}
    {{--        },--}}
    {{--        success: function (data) {--}}
    {{--            alert(data);--}}
    {{--            if (data.result) {--}}
    {{--                alert("Kayıt başarılı!");--}}
    {{--            } else {--}}
    {{--                alert("Bir sorun oluştu!");--}}
    {{--            }--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}
</script>

