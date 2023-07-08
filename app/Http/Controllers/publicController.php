<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\customerController ;
class publicController extends Controller
{
    public function dashboard(){
      $customers = Customer::all() ;
      return  view('dashboard' , compact('customers')) ;
    }
    public function welcome(){
        return view('welcome') ;
    }
}
