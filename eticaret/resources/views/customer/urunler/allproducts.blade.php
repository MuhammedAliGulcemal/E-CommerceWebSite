<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-2 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Fiyata Göre Filtrele</h5>
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="" type="checkbox" class="custom-control-input" checked=""
                               id="price-all">
                        <label class="custom-control-label" for="price-all">Bütün fiyatlar</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="" type="checkbox" class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1">0₺ - 100₺</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-2">
                        <label class="custom-control-label" for="price-2">100₺ - 200₺</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-3">
                        <label class="custom-control-label" for="price-3">200₺ - 300₺</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-4">
                        <label class="custom-control-label" for="price-4">300₺ - 400₺</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="price-5">
                        <label class="custom-control-label" for="price-5">400₺ - 500₺</label>
                    </div>
                </form>
            </div>
            <!-- Price End -->
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                @foreach($product as $val)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img style="height: 400px" class="img-fluid w-100"
                                     src="/storage/image/productimages/{{$val->image}}">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$val->product_name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{$val->price."₺"}}</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{route("urun-detay-getir",$val->product_name)}}"
                                   class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Detaylı
                                    gör</a>
                                <a href="{{route("urun-detay-getir",$val->product_name)}}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Sepete ekle</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            @if($product->hasPages())
                                <div class="pagination-wrapper">
                                    {{$product->links()}}
                                </div>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<script>
    {{--function buyProduct(id) {--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route("musteri-add-one-product")}}",--}}
    {{--        type: "post",--}}
    {{--        data: {--}}
    {{--            _token: "{{csrf_token()}}",--}}
    {{--            product_id: id,--}}
    {{--            count: 1,--}}
    {{--        }, success: function (data) {--}}
    {{--            if (data.result) {--}}
    {{--                alert("Yorumunuz başarıyla oluşturuldu!");--}}
    {{--            } else {--}}
    {{--                alert("Bir sorun oluştu!");--}}
    {{--            }--}}
    {{--        }--}}
    {{--    });--}}

    {{--}--}}

    function filterProduct() {
        var1 = document.getElementById("price-all").checked;
        var2 = document.getElementById("price-1").checked;
        var3 = document.getElementById("price-2").checked;
        var4 = document.getElementById("price-3").checked;
        var5 = document.getElementById("price-4").checked;
        var6 = document.getElementById("price-5").checked;
        const arr = [var1, var2, var3, var4, var5, var6];
        window.location.href = "{{route("musteri-filter-products")}}/" + arr;
    }

</script>
