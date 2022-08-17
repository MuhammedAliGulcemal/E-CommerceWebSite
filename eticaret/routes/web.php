<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ZiyaretciController;
use App\Http\Controllers\YoneticiController;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\UrunController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});
Route::group(["prefix" => "ziyaretci"], function (){
    Route::get("/anasayfa", [ZiyaretciController::class, "index"])->name("ziyaretci-anasayfa");
});
Route::group(["prefix" => "yonetici","middleware"=>["auth","verified","can:yonetici"]], function (){
    Route::get("/anasayfa", [YoneticiController::class, "index"])->name("yonetici-anasayfa");
    Route::post("/anasayfa", [YoneticiController::class, "createProduct"])->name("yonetici-create-product");
    Route::post("/category", [YoneticiController::class, "createCategory"])->name("yonetici-create-category");
    Route::delete("/category", [YoneticiController::class, "removeCategory"])->name("yonetici-remove-category");
    Route::delete("/anasayfa/{id?}", [YoneticiController::class, "removeProduct"])->name("yonetici-remove-product");
    Route::delete("/edit", [YoneticiController::class, "removeCustomer"])->name("yonetici-remove-customer");
    Route::get("/edit", [YoneticiController::class, "editCustomer"])->name("yonetici-kullanici-duzenle");
    Route::post("/edit", [YoneticiController::class, "updateProduct"])->name("yonetici-update-product");
    Route::get("/edit/{product_name?}", [YoneticiController::class, "updateBlade"])->name("yonetici-product-blade");
    Route::get("/urun/{text?}", [YoneticiController::class, "searchProduct"])->name("yonetici-search-product");
    Route::get("/edit/customer/{text?}", [YoneticiController::class, "searchCustomer"])->name("yonetici-search-customer");
    Route::get("/profil", [YoneticiController::class, "getProfile"])->name("yonetici-get-profile");
    Route::put("/profil", [YoneticiController::class, "updateProfile"])->name("yonetici-update-profile");
    Route::get("/property/{id?}", [YoneticiController::class, "bladeProperty"])->name("yonetici-property-blade");
    Route::post("/property", [YoneticiController::class, "addProperty"])->name("yonetici-create-property");

});
Route::group(["prefix" => "musteri","middleware"=>["auth","verified","can:musteri"]], function (){
    Route::get("/anasayfa", [MusteriController::class, "index"])->name("musteri-anasayfa");
    Route::post("/anasayfa", [MusteriController::class, "addProduct"])->name("musteri-add-product");
    //Route::post("/anasayfa", [MusteriController::class, "addOneProduct"])->name("musteri-add-one-product");
    Route::get("/sepet", [MusteriController::class, "sepet"])->name("musteri-sepet");
    Route::get("/urunler", [MusteriController::class, "showProducts"])->name("musteri-show-products");
    Route::get("/urunler/{text?}", [MusteriController::class, "searchProduct"])->name("musteri-search-products");
    Route::delete("/sepet", [MusteriController::class, "removeProduct"])->name("musteri-remove-product");
    Route::get("/urun/{name?}", [MusteriController::class, "getCategory"])->name("urun-kategori-getir");
    Route::get("/detaylar/{product_name?}", [MusteriController::class, "getDetails"])->name("urun-detay-getir");
    Route::post("/detaylar/{product_name?}", [MusteriController::class, "makeComment"])->name("musteri-yorum-yap");
    Route::get("/satinal", [MusteriController::class, "checkOut"])->name("musteri-satin-al");
    Route::get("/profil", [MusteriController::class, "getProfile"])->name("musteri-get-profile");
    Route::put("/profil", [MusteriController::class, "updateProfile"])->name("musteri-update-profile");
    Route::get("/", [MusteriController::class, "filterProduct"])->name("musteri-filter-products");

});
Route::group(["prefix" => "urun"], function (){
    Route::get("/yonetici", [UrunController::class, "yoneticiIndex"])->name("urun-yonetici-anasayfa");
    Route::get("/musteri", [UrunController::class, "musteriIndex"])->name("urun-musteri-anasayfa");

});
Route::get('/logout', '\App\Http\Controllers\Auth\RegisteredUserController@logout')->name("logout");
//"middleware"=>["auth","verified","can:yonetici"]
//"middleware"=>["auth","verified","can:musteri"]
require __DIR__ . '/auth.php';
