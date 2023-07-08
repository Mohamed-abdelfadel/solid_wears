<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\vendor;
use Illuminate\Support\Facades\validator;
use App\Http\Controllers\cityController ;

class vendorController extends Controller
{
//    public function __construct(){
//        $this->middleware(['auth']);
//    }

    public function list(){
        if(request('search')){
            $search = request('search') ;
            $vendors = vendor::where('name', 'like', "%$search%")->orWhere('id', 'like', "%$search%")->orWhere('phone', 'like', "%$search%")->orWhere('email', 'like', "%$search%")->orWhere('address', 'like', "%$search%")->paginate(10)->withQueryString();
        }
        else{
            $vendors = vendor::query()->select(['id', 'name', 'phone' , 'email' , 'address' , 'city_id'])->orderBy('id' , 'desc')->paginate(10) ;
        }
        return view('vendors.list' , compact('vendors')) ;
    }


    public function create(){
        $cities = City::all() ;
        return view('vendors.create' , compact('cities')) ;
    }


    public function store(Request $request){
        $data = $request->all() ;
        $rules = [
            'name' => 'required|max:50|regex:/^[a-zA-Z ]+$/' ,
            'phone' => 'required|numeric' ,
            'email' => 'required|unique:vendors,email|max:100|email:rfc,dns' ,
            'city' => "required|notIn:0"
        ] ;
        $message= [
            "max" => "Ooh that's the longest :attribute I ever seen !" ,
            "notIn" => "Please select a :attribute" ,
            "regex" => "The :attribute must contain only letters "
        ];
        $validator = Validator::make($data , $rules , $message ) ;
        if ($validator->passes()){
            $vendor = new vendor() ;
            $vendor->name = request('name') ;
            $vendor->phone = request('phone') ;
            $vendor->email = request('email') ;
            $vendor->address = request('address') ;
            $vendor->city_id = request('city') ;

            $vendor->save() ;
            $request->session()->flash('success' , " vendor ( $vendor->name ) has been added successfully !") ;
//            dd($vendor) ;
            return redirect()->route('vendors.list' ) ;
        }
        else{
            return redirect()->route('vendors.create')->withErrors($validator)->withInput() ;
        }


    }

    public function show($id){
        $vendor = vendor::query()->findOrFail($id) ;
        return view('vendors.show' , compact('vendor'));
    }


    public function edit($id){
        $vendor = vendor::query()->findOrFail($id) ;
        $cities = City::all() ;

        return view('vendors.edit' , compact("vendor" , 'cities')) ;
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
            $vendor =  vendor::query()->findOrFail($id) ;
            $vendor->name = request('name') ;
            $vendor->phone = request('phone') ;
            $vendor->email = request('email') ;
            $vendor->address = request('address') ;
            $vendor->city_id = request('city') ;
            $vendor->save() ;
            $request->session()->flash('success' , " vendor ( $vendor->name ) has been updated successfully !") ;
            return redirect()->route('vendors.list' ) ;
        }
        else{
            return redirect()->route('vendors.edit' , $id)->withErrors($validator)->withInput() ;
        }
    }


    public function destroy($id , Request $request){
        $vendor = vendor::query()->findOrFail($id) ;
        $vendor->delete() ;
        $request->session()->flash('success' , " vendor ( $vendor->name ) has been deleted successfully !") ;

        return redirect()->route('vendors.list') ;
    }
    public function trash(){
        $vendors = vendor::onlyTrashed()->paginate(8);
        return view('vendors.trash' , compact('vendors')) ;
    }
    public function restore($id){
        $vendor = vendor::withTrashed()->findOrFail($id);
        $vendor->restore() ;
        return redirect()->route('vendors.trash') ;
    }
    public function fdelete($id){
        $vendor = vendor::withTrashed()->findOrFail($id);
        $vendor->forceDelete() ;
        return redirect()->route('vendors.trash') ;
    }
}
