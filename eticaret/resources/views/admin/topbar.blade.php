<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{route("yonetici-anasayfa")}}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><img style="width: 80px" src="/storage/image/logo.png">Mağaza</h1>
            </a>
        </div>
        <div>
            <li style="margin-left: 1200px" class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                    <img style="width: 35px" class="img-profile rounded-circle" src="/storage/profilepic/pp.jpg">
                    <i>{{\Illuminate\Support\Facades\Auth::user()->name}}</i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <a  style="margin-left: 55px" href="{{route("yonetici-get-profile")}}" class="button">Profil</a>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <a  style="margin-left: 55px" onclick="logout()" class="button">Logout</a>
                    </a>
                </div>
            </li>
        </div>
    </div>
</div>
<script>
    function logout(){
        if (confirm("Oturumu kapatmak istiyor musunuz?")) {
            location.href = "{{route("logout")}}";
        }
    }
</script>
