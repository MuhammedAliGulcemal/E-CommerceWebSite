<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Sepet;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Result;
use phpDocumentor\Reflection\Utils;
use Ramsey\Uuid\Type\Integer;

class MusteriController extends Controller
{
    public function index()
    {
        $this->totalCount();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $product = DB::table("products")->get();
        $data1["products"] = $product;
        $data["title"] = "musteri ana sayfa";
        $data["content"] = view("/customer/urunler/product", $data1);
        $data["categories"] = view("/layouts/categories", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }

    public function totalCount()
    {
        $category = DB::table("categories")->get();
        $product = DB::table("products")->get();
        foreach ($category as $val) {
            $count = 0;
            foreach ($product as $value) {
                if ($val->id === $value->category) {
                    $count += $value->count;
                }
            }
            DB::table('categories')
                ->where('id', $val->id)
                ->update(['totalcount' => $count]);
        }
    }

    public function totalPrice()
    {
        $sepet = DB::table("sepets")->where("user_id", "=", Auth::user()->id)->get();
        $product = DB::table("products")->get();
        $totalprice = 0;
        foreach ($sepet as $val) {
            foreach ($product as $value) {
                if ($val->product_id == $value->id)
                    $totalprice += $value->price * $val->count;
            }
        }
        return $totalprice;
    }

    public function countEsitle()
    {
        $products = DB::table("products")->get();
        $properties = DB::table("properties")->get();
        $count = 0;
        foreach ($products as $value) {
            foreach ($properties as $val) {
                if ($value->id == $val->product_id) {
                    $count += $val->count;
                }
            }
            DB::table("products")->where("id", "=", $value->id)->update(["count" => $count]);
            $count = 0;
        }
    }
//    public function addOneProduct(Request $request)
//    {
//        //  Auth::user()->id;
////        DB::table("sepets")->insert([
////            "product_id"=>1,
////            "user_id"=>4
////        ]);
//        $product_count = DB::table("properties")->where("product_id", "=", $request->product_id)->first()->count;
//        if ($product_count > 0) {
//            DB::table("properties")->where("product_id", "=", $request->product_id)->decrement("count", $request->count);
//            $this->totalCount();
//            $user_id = Auth::user()->id;
//            $obj = DB::table("sepets")->get();
//            $bool = false;
//            $id = 0;
//            foreach ($obj as $val) {
//                if ($val->user_id == $user_id) {
//                    if ($val->product_id == $request->product_id) {
//                        $id = $val->id;
//                        $bool = true;
//                    } else {
//                        $bool = false;
//                    }
//                }
//            }
//            if ($bool) {
//                DB::table("sepets")->where("id", "=", $id)->increment("count", $request->count);
//                return redirect()->back();
//            } else {
//                $sepet = new Sepet();;
//                $sepet->user_id = $user_id;
//                $sepet->product_id = $request->product_id;
//                $sepet->count = $request->count;
//                $sepet->save();
//                $this->totalCount();
//                return response()->json([
//                    "result" => true,
//                ]);
//            }
//        } else {
//            return response()->json([
//                "result" => true,
//            ]);
//        }
//
//    }
    public function addProduct(Request $request)
    {
        //  Auth::user()->id;
//        DB::table("sepets")->insert([
//            "product_id"=>1,
//            "user_id"=>4
//        ]);
        $color = $_POST["color"];
        $size = $_POST["size"];
        $prop_id = DB::table("properties")->where("product_id", "=", $request->product_id)
            ->where("color", "=", $color)->where("size", "=", $size)->first()->id;
        $product_count = DB::table("properties")->where("product_id", "=", $request->product_id)
            ->where("color", "=", $color)->where("size", "=", $size)->first()->count;
        if ($product_count > 0) {
            DB::table("properties")->where("id", "=", $prop_id)->decrement("count", $request->count);
            $this->totalCount();
            $user_id = Auth::user()->id;
            $obj = DB::table("sepets")->get();
            $bool = false;
            $id = 0;
            foreach ($obj as $val) {
                if ($val->user_id == $user_id) {
                    if ($val->product_id == $request->product_id) {
                        $id = $val->id;
                        $bool = true;
                    } else {
                        $bool = false;
                    }
                }
            }
            if ($bool) {
                DB::table("sepets")->where("id", "=", $id)->increment("count", $request->count);
                $this->countEsitle();
                return redirect()->back();
            } else {
                $sepet = new Sepet();;
                $sepet->user_id = $user_id;
                $sepet->product_id = $request->product_id;
                $sepet->count = $request->count;
                $sepet->property_id = $prop_id;
                $sepet->save();
                $this->totalCount();
                $this->countEsitle();
                return redirect()->back();
            }
        } else {
            $this->countEsitle();
            return redirect()->back();
        }

    }

    public function sepet()
    {
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $sepet = DB::table("sepets")->where("user_id", "=", Auth::user()->id)->get();
        $properties= DB::table("properties")->get();
        $product = DB::table("products")->get();
        $data1["sepet"] = $sepet;
        $data1["properties"] = $properties;
        $data1["product"] = $product;
        $data1["totalprice"] = $this->totalPrice();
        $data["title"] = "musteri sepet";
        $data["categories"] = view("/layouts/categories", $data1);
        $data["content"] = view("/products/cart", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }

    public function removeProduct(Request $request)
    {
        $count = DB::table("sepets")->where("id", "=", $request->id)->first();
        if ($request->count == $count->count) {
            DB::table("sepets")->where("id", "=", $request->id)->delete();
        } else {
            DB::table("sepets")->where("id", "=", $request->id)->decrement("count", $request->count);
        }
        DB::table("properties")->where("id", "=", $request->prop_id)->increment("count", $request->count);
        $this->totalCount();
        $this->countEsitle();
        return response()->json([
            "result" => true,
        ]);
    }

    public function showProducts()
    {
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $product = DB::table("products")->paginate(10);
        $data1["product"] = $product;
        $data["title"] = "musteri ürünler";
        $data["categories"] = view("/layouts/categories", $data1);
        $data["content"] = view("/customer/urunler/allproducts", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }

    public function getCategory($name = null)
    {
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data["categories"] = view("/layouts/categories", $data1);
        $id = DB::table("categories")->where("name", "=", $name)->first();
        $products = DB::table("products")->where("category", "=", $id->id)->paginate(10);
        $data1["product"] = $products;
        $data["title"] = "Urun kategori getir";
        $data["content"] = view("/customer/urunler/allproducts", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }

    public function productPoint($id)
    {
        $comments = DB::table("comments")->get();
        $counter = 0;
        $point = 0;
        foreach ($comments as $val) {
            if ($val->product_id == $id) {
                $counter++;
                $point += $val->point;
            }
        }
        if ($counter == 0) {
            return array($counter, $counter);
        } else {
            return array((int)($point / $counter), $counter);
        }

    }

    public function getDetails($product_name = null)
    {
        $category = DB::table("categories")->get();
        $comments = DB::table("comments")->get();
        $properties = DB::table("properties")->get();
        $users = DB::table("users")->get();
        $data1["category"] = $category;
        $data1["comments"] = $comments;
        $data1["properties"] = $properties;
        $data1["users"] = $users;
        $data["categories"] = view("/layouts/categories", $data1);
        $products = DB::table("products")->where("product_name", "=", $product_name)->get();
        $data1["product_point"] = $this->productPoint(DB::table("products")->where("product_name", "=", $product_name)->first()->id);
        $data1["product"] = $products;
        $data["title"] = "Urun detay getir";
        $data["content"] = view("/products/details", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }


    public function makeComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->point = $request->point;
        $comment->save();
        return response()->json([
            "result" => true
        ]);
    }

    public function checkOut()
    {
        $this->totalCount();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $sepet = DB::table("sepets")->where("user_id", "=", Auth::user()->id)->get();
        $product = DB::table("products")->get();
        $data1["products"] = $product;
        $data1["sepet"] = $sepet;
        $data["title"] = "musteri ana sayfa";
        $data1["totalprice"] = $this->totalPrice();
        $data["content"] = view("/products/checkout", $data1);
        $data["categories"] = view("/layouts/categories", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }

    public function searchProduct($text = null)
    {
        $products = DB::table("products")->where("product_name", "LIKE", "%" . $text . "%")->paginate(10);
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data["categories"] = view("/layouts/categories", $data1);
        $data1["product"] = $products;
        $data["title"] = "Aranan urun";
        $data["content"] = view("/customer/urunler/allproducts", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }

    public function getProfile()
    {
        $user = DB::table("users")->where("id", "=", Auth::user()->id)->first();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data["totalprice"] = $this->totalPrice();
        $data1["user"] = $user;
        $data["categories"] = view("/layouts/categories", $data1);
        $data["title"] = "Musteri profil";
        $data["content"] = view("/layouts/profile", $data1);
        return view("/customer/main", $data);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            "result" => true,
        ]);
    }

    public function filterProduct($arr)
    {
        $products = DB::table("products")->get();
        $category = DB::table("categories")->get();
        $data1["category"] = $category;
        $data["categories"] = view("/layouts/categories", $data1);
        $data1["product"] = $products;
        $data["title"] = "Urun filtre getir";
        $data["content"] = view("/customer/urunler/allproducts", $data1);
        $data["totalprice"] = $this->totalPrice();
        return view("/customer/main", $data);
    }
}
