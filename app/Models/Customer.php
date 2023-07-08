<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\City;
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes ;
    public function city(){
        return $this->belongsTo(City::class) ;
    }
}
