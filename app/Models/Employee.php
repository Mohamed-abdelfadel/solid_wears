<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use HasFactory;
    use SoftDeletes ;
    public function city(){
        return $this->belongsTo(City::class) ;
    }
}
