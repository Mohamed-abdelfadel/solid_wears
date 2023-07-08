<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class City extends Model
{
    use SoftDeletes ;
    use HasFactory;


    public function customers(){
        return $this->hasMany(Customer::class) ;
    }
    public function employees(){
        return $this->hasMany(Employee::class) ;
    }
    public function vendors(){
        return $this->hasMany(Vendor::class) ;
    }
    public function scopeFilter($query , array $filters){
        $query->when($filters['search'] ?? false , function ($query , $search){
            $query->from('cities')->whereColumn('cities.id' , 'customers.city_id')->where('cities.name' , "$search") ;
        });

//$query->where('name' , 'like' , "%$search%");
    }
}
