<div class="container mt-5">
    <div class="col-lg-15 col-15 text-left">
        <form action="">
            <div class="input-group">
                <input id="id_musteri_ara" type="text" class="form-control" placeholder="Kullanıcı ara">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <a onclick="searchCustomer()" class="fa fa-search"></a>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-15 col-lg-15 col-xl-15 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Ad</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->email}}</td>
                                <td><a href="#" class="tm-product-delete-link">
                                        <i onclick="removeCustomer({{$val->id}})"
                                           class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function removeCustomer(id){
        if (confirm("Silme işlemini onaylıyor musunuz?")) {
            $.ajax({
                url: "{{route("yonetici-remove-customer")}}",
                type: "delete",
                data: {
                    _token: "{{csrf_token()}}",
                    id: id
                },
                success:function (data){
                    if(data.result){
                        alert("Silme başarılı!");
                    }else{
                        alert("Bir sorun oluştu!");
                    }
                }
            });
        }
    }
    function searchCustomer() {
        window.location.href = "{{route("yonetici-search-customer")}}/" + $("#id_musteri_ara").val();
    }
</script>

