<div class="col-lg-2 d-none d-lg-block">
    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 collapsed" data-toggle="collapse" href="#navbar-vertical" style="height: 50px; margin-top: -1px; padding: 0 30px;" aria-expanded="false">
        <h6 class="m-0">Kategoriler</h6>
        <i class="fa fa-angle-down text-dark"></i>
    </a>
    <nav class="position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light collapse" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
            @yield("categories")
        </div>
    </nav>
</div>
<div class="col-lg-9">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route("musteri-anasayfa")}}" class="nav-item nav-link active">ANA SAYFA</a>
                        <a href="{{route("musteri-show-products")}}" class="nav-item nav-link">ÜRÜNLER</a>
                    </div>
                </div>
            </nav>
        </div>
    </nav>
</div>



