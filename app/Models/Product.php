<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;
use App\Models\Gender ;
use App\Models\Size ;
use App\Models\Brand ;
use App\Models\Type ;
use App\Models\Color ;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = 'id' ;
    protected $with = ['brand' , 'color' , 'gender' , 'type' , 'size'] ;
    function gender(){
        return $this->belongsTo(Gender::class) ;
    }
    function size(){
        return $this->belongsTo(Size::class) ;
    }
    function brand(){
        return $this->belongsTo(Brand::class) ;
    }
    function type(){
        return $this->belongsTo(Type::class) ;
    }
    function color(){
        return $this->belongsTo(Color::class) ;
    }

}
