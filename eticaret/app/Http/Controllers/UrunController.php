<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UrunController extends Controller
{
    public function yoneticiIndex(){
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data["categories"] = view("/layouts/categories",$data1);
        $product = DB::table("products")->get();
        $data1["products"] = $product;
        $data["title"] = "Urun ana sayfa";
        $data["content"] = view("/admin/urunler/product",$data1);
        return view("/admin/main", $data);
    }
    public function musteriIndex(){
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data["categories"] = view("/layouts/categories",$data1);
        $product = DB::table("products")->get()->where("category", "=", 1);
        $data1["products"] = $product;
        $data["title"] = "Urun ana sayfa";
        $data["content"] = view("/customer/urunler/product",$data1);
        return view("/customer/main", $data);
    }


}

