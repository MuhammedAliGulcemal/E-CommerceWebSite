<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
                <h2 class="tm-block-title">Hesap Ayarları</h2>
                <form action="" class="tm-signup-form row">
                    <div class="form-group col-lg-6">
                        <label for="name">İsim</label>
                        <input id="id_name" name="name" type="text" class="form-control validate"
                               value="{{$user->name}}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="email">E-Mail</label>
                        <input id="id_email" name="email" type="email" class="form-control validate"
                               value="{{$user->email}}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="password">Şifre</label>
                        <input id="id_password" name="password" class="form-control validate">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="password2">Şifreyi Tekrar Girin</label>
                        <input id="id_password2" name="password2" class="form-control validate">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="role">Rol</label>
                        <input id="id_role" name="role" type="tel" class="form-control validate"
                               @if($user->role == 2)
                                   value="Yönetici"
                               @else
                                   value="Müşteri"
                               @endif readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="tm-hide-sm">&nbsp;</label>
                        <button onclick="updateProfile()" type="submit"
                                class="btn btn-primary btn-block text-uppercase">
                            Hesabı Güncelle
                        </button>
                    </div>
                    <div class="col-12">
                        <button onclick="deleteProfile()" type="submit" class="btn btn-primary btn-block text-uppercase">
                            Hesabı Sil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function updateProfile() {
        if({{$user->role}} === 2){
            _name = $("#id_name").val();
            _email = $("#id_email").val();
            $.ajax({
                url: "{{route("yonetici-update-profile")}}",
                type: "put",
                data: {
                    _token: "{{csrf_token()}}",
                    name: _name,
                    email: _email,
                },
                success: function (data) {
                    if (data.result) {
                        alert("Güncelleme başarılı!");
                    } else {
                        alert("Bir sorun oluştu!");
                    }
                }
            });
        }else{
            _name = $("#id_name").val();
            _email = $("#id_email").val();
            $.ajax({
                url: "{{route("musteri-update-profile")}}",
                type: "put",
                data: {
                    _token: "{{csrf_token()}}",
                    name: _name,
                    email: _email,
                },
                success: function (data) {
                    if (data.result) {
                        alert("Güncelleme başarılı!");
                    } else {
                        alert("Bir sorun oluştu!");
                    }
                }
            });
        }

    }
    {{--function deleteProfile(){--}}
    {{--    if(confirm("Profilinizi silmek istiyor musunuz?" +--}}
    {{--        "(Bu işlem geri alınamaz!)")){--}}
    {{--        {{\Illuminate\Support\Facades\DB::table("users")->delete(\Illuminate\Support\Facades\Auth::user()->id)}};--}}
    {{--        {{\Illuminate\Support\Facades\DB::table("sepets")->where("user_id","=",\Illuminate\Support\Facades\Auth::user()->id)->delete()}};--}}
    {{--        {{\Illuminate\Support\Facades\DB::table("comments")->where("user_id","=",\Illuminate\Support\Facades\Auth::user()->id)->delete()}};--}}
    {{--    }--}}
    {{--}--}}


</script>
