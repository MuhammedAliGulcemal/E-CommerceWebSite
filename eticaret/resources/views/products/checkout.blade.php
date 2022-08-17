<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Teslimat Adresi</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>İsim</label>
                        <input class="form-control" type="text" placeholder="İsimÖrnek">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Soy İsmi</label>
                        <input class="form-control" type="text" placeholder="SoyİsmiÖrnek">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="örnek@örnek.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Telefon</label>
                        <input class="form-control" type="text" placeholder="+12345678">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Adres 1</label>
                        <input class="form-control" type="text" placeholder="Abc mahallesi">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Adres 2</label>
                        <input class="form-control" type="text" placeholder="Def sokak">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Ülke</label>
                        <select class="custom-select">
                            <option selected="">Türkiye</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Şehir</label>
                        <input class="form-control" type="text" placeholder="İstanbul">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>İlçe</label>
                        <input class="form-control" type="text" placeholder="Arnavutköy">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Posta Kodu</label>
                        <input class="form-control" type="text" placeholder="34277">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Sipariş</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Ürünler</h5>
                    @foreach($products as $val)
                        @foreach($sepet as $value)
                            @if($val->id === $value->product_id)
                                <div class="d-flex justify-content-between">
                                    <p>{{$val->product_name}}</p>
                                    <p>{{$value->count}} adet</p>
                                    <p>{{$val->price * $value->count}}₺</p>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    <hr class="mt-0">
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
                </div>

            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Ödeme</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="kapida">
                            <label class="custom-control-label" for="kapida">Kapıda Ödeme</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="online">
                            <label class="custom-control-label" for="online">Online Ödeme</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Siparişi Tamamla</button>
                </div>
            </div>
        </div>
    </div>
</div>
