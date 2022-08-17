<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Özellik Ekle</h2>
                    </div>
                </div>
                <form method="post" action="{{route("yonetici-create-property")}}" class="tm-edit-product-form"
                      enctype="multipart/form-data">
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="id_id">İd
                                    </label>
                                    <input id="id_id" name="product_id" type="text"
                                           class="form-control validate hasDatepicker" data-large-mode="true" value="{{$product->id}}" readonly>
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="id_product">Ürün
                                    </label>
                                    <input id="id_product" name="product_name" type="text"
                                           class="form-control validate hasDatepicker" data-large-mode="true" value="{{$product->product_name}}" readonly>
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="id_size">Beden
                                    </label>
                                    <input id="id_size" name="size" type="text"
                                           class="form-control validate hasDatepicker" data-large-mode="true">
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="id_color">Renk
                                    </label>
                                    <input id="id_color" name="color" type="text"
                                           class="form-control validate hasDatepicker" data-large-mode="true">
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="id_count">Adet
                                    </label>
                                    <input id="id_count" name="count" type="number" class="form-control validate"
                                           required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-block text-uppercase">Özellik Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



