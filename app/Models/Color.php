<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product ;
class Color extends Model
{
  use HasFactory;
  use SoftDeletes;
      public function products(){
          return $this->hasMany(Product::class) ;
      }
}
