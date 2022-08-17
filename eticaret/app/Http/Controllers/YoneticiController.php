<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Propertie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class YoneticiController extends Controller
{
    public function __construct()
    {
        //$this->middleware(["auth","verified","can:yonetici"]);
    }

    public function index()
    {
        $this->countEsitle();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data1["categories"] = $category;
        $data["title"] = "Ana Sayfa";
        $data["topbar"] = view("/admin/topbar");
        $data["content"] = view("/admin/urunler/main", $data1);
        $data["categories"] = view("/layouts/categories", $data1);
        return view("/admin/main", $data);
    }

    public function createProduct(Request $request)
    {
        $product = new Product();
        if($request->hasFile("image")){
            $file= $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = $request->product_name.".".$ext;
            $path = $request->file("image")->storeAs("/public/image/productimages/",$filename);
            $product->image = $filename;
        }
        $product->product_name = $request->input("product_name");
        $product->count = $request->input("count");
        $product->price = $request->input("price");
        $product->category = $request->input("category");
        $product->details = $request->input("details");
        $product->save();
        return redirect("/yonetici/anasayfa");
    }

    public function createCategory(Request $request)
    {
        $category = new Categorie();
        if($request->hasFile("image")){
            $file= $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = $request->name.".".$ext;
            $path = $request->file("image")->storeAs("/public/image/categoryimages/",$filename);
            $category->image = $filename;
        }
        $category->name = $request->input("name");
        $category->totalcount = 0;
        $category->save();
        return redirect("/urun/yonetici");
    }

    public function removeProduct(Request $request)
    {
        DB::table("products")->where("id", "=", $request->id)->delete();
        return response()->json([
            "result" => true,
        ]);

    }
    public function removeCategory(Request $request)
    {
        DB::table("categories")->where("id", "=", $request->id)->delete();
        return response()->json([
            "result" => true,
        ]);

    }

    public function editCustomer()
    {
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $user = DB::table("users")->get()->where("role", "=", 1);
        $data1["users"] = $user;
        $data["title"] = "Kullanici Duzenle";
        $data["categories"] = view("/layouts/categories", $data1);
        $data["content"] = view("/admin/editcustomers", $data1);
        return view("/admin/main", $data);
    }

    public function removeCustomer(Request $request)
    {
        DB::table("users")->where("id", "=", $request->id)->delete();
        return response()->json([
            "result" => true,
        ]);
    }

    public function updateProduct(Request $request)
    {
        if($request->hasFile("image")){
            $file= $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = $request->input("product_name").".".$ext;
            $path = $request->file("image")->storeAs("/public/image/productimages/",$filename);
            DB::table("products")->where("id","=",$request->input("id"))->update(["image"=>$filename]);
        }
        DB::table("products")->where("id","=",$request->input("id"))->update(["product_name"=>$request->input("product_name")]);
        DB::table("products")->where("id","=",$request->input("id"))->update(["price"=>$request->input("price")]);
        DB::table("products")->where("id","=",$request->input("id"))->update(["category"=>$request->input("category")]);
        DB::table("products")->where("id","=",$request->input("id"))->update(["details"=>$request->input("details")]);
//        $product = Product::find($request->input("id"));
//        $product->image = $filename;
//        $product->product_name = $request->input("product_name");
//        $product->price = $request->input("price");
//        $product->category = $request->input("category");
//        $product->details = $request->input("details");
//        $product->save();
        return redirect()->back();
    }

    public function updateBlade($product_name = null)
    {
        $category = DB::table("categories")->get();
        $product = DB::table("products")->where("product_name", "=", $product_name)->first();
        $data1["category"] = $category;
        $data1["categories"] = $category;
        $data1["product"] = $product;
        $data["title"] = "Ana Sayfa";
        $data["topbar"] = view("/admin/topbar");
        $data["content"] = view("/admin/urunler/update", $data1);
        $data["categories"] = view("/layouts/categories", $data1);
        return view("/admin/main", $data);
    }
    public function searchProduct($text = null){
        $products =  DB::table("products")->where("product_name", "LIKE", "%".$text."%")->get();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data["categories"] = view("/layouts/categories",$data1);
        $data1["products"] = $products;
        $data["title"] = "Aranan urun";
        $data["content"] = view("/admin/urunler/product",$data1);
        return view("/admin/main", $data);
    }
    public function searchCustomer($text = null){
        $user =  DB::table("users")->where("name", "LIKE", "%".$text."%")->where("role","=",1)->get();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data1["users"] = $user;
        $data["title"] = "Kullanici Duzenle";
        $data["categories"] = view("/layouts/categories", $data1);
        $data["content"] = view("/admin/editcustomers", $data1);
        return view("/admin/main", $data);
    }
    public function getProfile(){
        $user = DB::table("users")->where("id","=",Auth::user()->id)->first();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data1["user"] = $user;
        $data["categories"] = view("/layouts/categories",$data1);
        $data["title"] = "Aranan urun";
        $data["content"] = view("/layouts/profile",$data1);
        return view("/admin/main", $data);
    }
    public function updateProfile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            "result" => true,
        ]);
    }
    public function bladeProperty($id = null)
    {
        $product = DB::table("products")->where("id","=",$id)->first();
        $data1["product"] = $product;
        $data["title"] = "Ana Sayfa";
        $data["topbar"] = view("/admin/topbar");
        $data["content"] = view("/admin/urunler/property", $data1);
        return view("/admin/main", $data);
    }
    public function addProperty(Request $request)
    {
        $property = DB::table("properties")->get();
        $bool = false;
        $id = 0;
        foreach ($property as $prop){
            if($prop->color ==  $request->input("color")){
                if($prop->size == $request->input("size")){
                    $bool = true;
                    $id = $prop->id;
                }
            }
        }
        if($bool){
            DB::table("properties")->where("id","=",$id)->increment("count",$request->input("count"));
            $this->countEsitle();
        }else{
            $propertie = new Propertie();
            $propertie->product_id = $request->input("product_id");
            $propertie->color = $request->input("color");
            $propertie->size = $request->input("size");
            $propertie->count = $request->input("count");
            $propertie->save();
            $this->countEsitle();
        }
        //DB::table("products")->where("id","=", $request->input("product_id"))->increment("count",$request->input("count"));
        return redirect()->back();
    }
    public function countEsitle(){
        $products = DB::table("products")->get();
        $properties = DB::table("properties")->get();
        $count = 0;
        foreach ($products as $value){
            foreach ($properties as $val){
                if($value->id == $val->product_id){
                    $count+=$val->count;
                }
            }
            DB::table("products")->where("id","=", $value->id)->update(["count"=>$count]);
            $count=0;
        }
    }
}


