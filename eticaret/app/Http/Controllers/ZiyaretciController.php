<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZiyaretciController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        if(Auth::user()->role == env("YONETICI")){
            return redirect()->route("yonetici-anasayfa");
        }else  if(Auth::user()->role == env("MUSTERI")){
            return redirect()->route("musteri-anasayfa");
        }
    }
}
