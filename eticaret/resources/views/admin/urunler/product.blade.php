<div class="container mt-5">
    <div class="col-lg-6 col-6 text-left">
        <form action="">
            <div class="input-group">
                <input id="id_urun_ara" type="text" class="form-control" placeholder="Ürün ara">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <a onclick="searchProduct()" class="fa fa-search"></a>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                        <tr>
                            <th scope="col">Görsel</th>
                            <th scope="col">Id</th>
                            <th scope="col">Ad</th>
                            <th scope="col">Adet</th>
                            <th scope="col">Fiyat</th>
                            <th scope="col">Sil</th>
                            <th scope="col">Düzenle</th>
                            <th scope="col">Özellik Ekle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $val)
                            <tr>
                                <td><img height="100px" src="/storage/image/productimages/{{$val->image}}"></td>
                                <td>{{$val->id}}</td>
                                <td id="id_product_name{{$val->id}}">{{$val->product_name}}</td>
                                <td id="id_product_count{{$val->id}}">{{$val->count}}</td>
                                <td id="id_product_price{{$val->id}}">{{$val->price}}</td>
                                <td><a href="#" class="tm-product-delete-link">
                                        <i onclick="removeProduct({{$val->id}})"
                                           class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                                <td><a href="{{route("yonetici-product-blade",$val->product_name)}}"
                                       class="btn btn-primary text-uppercase mb-3">Düzenle</a>
                                </td>
                                <td><a href="{{route("yonetici-property-blade",$val->id)}}"
                                       class="btn btn-primary text-uppercase mb-3">Özellik Ekle</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <a href="{{route("yonetici-anasayfa")}}" class="btn btn-primary btn-block text-uppercase mb-3">YENİ ÜRÜN
                    EKLE</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                <h2 class="tm-block-title">Kategoriler</h2>
                <div class="tm-product-table-container">
                    <table class="table tm-table-small tm-product-table">
                        <tbody>
                        @foreach($category as $value)
                            <tr>
                                <td class="tm-product-name">{{$value->name}}</td>
                                <td class="text-center">
                                    <a href="#" class="tm-product-delete-link">
                                        <i onclick="kategoriSil({{$value->id}})"
                                           class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <form method="post" action="{{route("yonetici-create-category")}}" class="tm-edit-product-form" enctype="multipart/form-data">
                    <div>
                        @csrf
                        <label for="id_kategori_ekle">Yeni Kategori:</label>
                        <input id="id_kategori_ekle" type="text" name="name">
                        <div class="custom-file mt-3 mb-3">
                            <input name="image" type="file" class="btn btn-primary btn-block mx-auto"
                                   value="GÖRSEL EKLE">
                        </div>
                        <button
                                class="btn btn-primary btn-block text-uppercase mb-3">Yeni Kategori Ekle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function searchProduct() {
        window.location.href = "{{route("yonetici-search-product")}}/" + $("#id_urun_ara").val();
    }

    function removeProduct(id) {
        if (confirm("Silme işlemini onaylıyor musunuz?")) {
            $.ajax({
                url: "{{route("yonetici-remove-product")}}",
                type: "delete",
                data: {
                    _token: "{{csrf_token()}}",
                    id: id
                },
                success: function (data) {
                    if (data.result) {
                        alert("Silme başarılı!");
                    } else {
                        alert("Bir sorun oluştu!");
                    }
                }
            });
        }
    }

    function kategoriSil(id) {
        if (confirm("Silme işlemini onaylıyor musunuz?")) {
            $.ajax({
                url: "{{route("yonetici-remove-category")}}",
                type: "delete",
                data: {
                    id: id,
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    if (data.result) {
                        alert("Kategori silindi!");
                    } else {
                        alert("Bir sorun oluştu!");
                    }
                }
            });
        }
    }

    {{--function kategoriEkle() {--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route("yonetici-create-category")}}",--}}
    {{--        type: "post",--}}
    {{--        data: {--}}
    {{--            name: $("#id_kategori_ekle").val(),--}}
    {{--            _token: "{{csrf_token()}}"--}}
    {{--        },--}}
    {{--        success: function (data) {--}}
    {{--            alert(data);--}}
    {{--            if (data.result) {--}}
    {{--                alert("Kategori eklendi!");--}}
    {{--            } else {--}}
    {{--                alert("Bir sorun oluştu!");--}}
    {{--            }--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}
</script>


