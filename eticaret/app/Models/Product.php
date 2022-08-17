<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Categorie;

class Product  extends Model
{
    use HasFactory;
//    protected $fillable = [
//        'product_name',
//        'count',
//        'price',
//        'category',
//        'image',
//    ];
//    public function category()
//    {
//        return $this->belongsTo(Categorie::class);
//    }

}

