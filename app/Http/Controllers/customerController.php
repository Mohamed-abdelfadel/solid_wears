<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Customer;
use Illuminate\Support\Facades\validator;
use App\Http\Controllers\cityController ;
class customerController extends Controller
{
//    public function __construct(){
//        $this->middleware(['auth']);
//    }

    public function list(){
        if(request('search')){
            $search = request('search') ;
            $customers = Customer::where('name', 'like', "%$search%")->orWhere('id', 'like', "%$search%")->orWhere('phone', 'like', "%$search%")->orWhere('email', 'like', "%$search%")->orWhere('address', 'like', "%$search%")->paginate(10)->withQueryString();
        }
        else{
            $customers = Customer::query()->latest('updated_at')->with('city')->paginate(10) ;
        }
        return view('customers.list' , compact('customers')) ;
    }


    public function create(){
        $cities = City::all() ;
        return view('customers.create' , compact('cities')) ;
    }


    public function store(Request $request){
        $data = $request->all() ;
        $rules = [
            'name' => 'required|max:50|regex:/^[a-zA-Z ]+$/' ,
            'phone' => 'required|numeric' ,
            'email' => 'required|unique:customers,email|max:100|email:rfc,dns' ,
            'city' => "required|notIn:0"
        ] ;
        $message= [
            "max" => "Ooh that's the longest :attribute I ever seen !" ,
            "notIn" => "Please select a :attribute" ,
            "regex" => "The :attribute must contain only letters "
        ];
        $validator = Validator::make($data , $rules , $message ) ;
        if ($validator->passes()){
            $customer = new Customer() ;
            $customer->name = request('name') ;
            $customer->phone = request('phone') ;
            $customer->email = request('email') ;
            $customer->address = request('address') ;
            $customer->city_id = request('city') ;

            $customer->save() ;
            $request->session()->flash('success' , " Customer ( $customer->name ) has been added successfully !") ;
//            dd($customer) ;
            return redirect()->route('customers.list' ) ;
        }
        else{
            return redirect()->route('customers.create')->withErrors($validator)->withInput() ;
        }


    }

    public function show($id){
        $customer = Customer::query()->findOrFail($id) ;
        return view('customers.show' , compact('customer'));
    }


    public function edit($id){
        $customer = Customer::query()->findOrFail($id) ;
        $cities = City::all() ;

        return view('customers.edit' , compact("customer" , 'cities')) ;
    }


    public function update( $id , Request $request){
        $data = $request->all() ;
        $rules = [
            'name' => 'required|max:50|regex:/^[a-zA-Z ]+$/' ,
            'phone' => 'required|numeric' ,
            'email' => 'required|max:100|email:rfc,dns' ,
            'city' => "required|notIn:0"
        ] ;
        $message= [
            "max" => "Ooh that's the longest :attribute I ever seen !" ,
            "notIn" => "Please select a :attribute" ,
            "regex" => "The :attribute must contain only letters "
        ];
        $validator = Validator::make($data , $rules , $message ) ;
        if ($validator->passes()){
            $customer =  Customer::query()->findOrFail($id) ;
            $customer->name = request('name') ;
            $customer->phone = request('phone') ;
            $customer->email = request('email') ;
            $customer->address = request('address') ;
            $customer->city_id = request('city') ;
            $customer->save() ;
            $request->session()->flash('success' , " Customer ( $customer->name ) has been updated successfully !") ;
            return redirect()->route('customers.list' ) ;
        }
        else{
            return redirect()->route('customers.edit' , $id)->withErrors($validator)->withInput() ;
        }
    }


    public function destroy($id , Request $request){
        $customer = Customer::query()->findOrFail($id) ;
        $customer->delete() ;
        $request->session()->flash('success' , " Customer ( $customer->name ) has been deleted successfully !") ;

        return redirect()->route('customers.list') ;
    }
    public function trash(){
        $customers = Customer::onlyTrashed()->paginate(8);
        return view('customers.trash' , compact('customers')) ;
    }
    public function restore($id){
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->restore() ;
        return redirect()->route('customers.trash') ;
    }
    public function fdelete($id){
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->forceDelete() ;
        return redirect()->route('customers.trash') ;
    }
}
