<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Ürün</th>
                    <th>Özellikler</th>
                    <th>Adet Fiyat</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @foreach($sepet as $val)
                    <tr>
                        @foreach($product as $value)
                            @if($val->product_id == $value->id)
                                @foreach($properties as $prop)
                                    @if($prop->id == $val ->property_id)
                                        <td class="align-middle"><img
                                                src="/storage/image/productimages/{{$value->image}}"
                                                alt="" style="width: 50px;"> {{$value->product_name}}
                                        </td>
                                        <td class="align-middle">{{$prop->color.", ".$prop->size}}</td>
                                        <td class="align-middle">{{$value->price}}₺</td>
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 50px;">
                                                <input id="id_quantity{{$val->id}}" type="number" min="1"
                                                       max="{{$val->count}}"
                                                       class="form-control form-control-sm bg-secondary text-center"
                                                       value="{{$val->count}}">
                                            </div>
                                        </td>
                                        <td class="align-middle">{{$value->price * $val->count}}₺</td>
                                        <td class="align-middle">
                                            <button
                                                onclick="removeProduct({{$val->id}},{{$val->product_id}},{{$prop->id}})"
                                                class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
                                        </td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Sepet Toplamı</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Ürünler</h6>
                        <h6 class="font-weight-medium">{{$totalprice}}₺</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Kargo</h6>
                        <h6 class="font-weight-medium">10₺</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Toplam</h5>
                        <h5 class="font-weight-bold">{{$totalprice + 10}}₺</h5>
                    </div>
                    <a href="{{route("musteri-satin-al")}}" class="btn btn-block btn-primary my-3 py-3">Satın Alımı
                        Onayla</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function removeProduct(id, _product_id, _prop_id) {
        _count = $("#id_quantity" + id).val();
        if (confirm("Silme işlemini onaylıyor musunuz?")) {
            $.ajax({
                url: "{{route("musteri-remove-product")}}",
                type: "delete",
                data: {
                    _token: "{{csrf_token()}}",
                    id: id,
                    product_id: _product_id,
                    count: _count,
                    prop_id: _prop_id
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
</script>
