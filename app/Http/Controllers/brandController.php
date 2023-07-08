<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\validator;
class brandController extends Controller
{
  //  public function __construct(){
  //      $this->middleware(['auth']);
  //  }
    public function list(){
        if (request('search')){
            $search = request('search');
            $brands = brand::where('name' , 'like' , "%$search%")->paginate(8)->withQueryString();
        }
        else{
            $brands = brand::query()->orderBy('id' , 'desc')->paginate(10);

        }

        return view('brands.list', compact('brands')) ;
    }
    public function create(){
        $brands = brand::query()->orderBy('id' , 'desc')->paginate(10);

        return view('brands.create' , compact('brands')) ;
    }
    public function store(Request $request){
        $data = $request->all() ;
        $rules = ["name" => 'required|unique:brands,name'] ;
        $message = ["unique" => 'This brand is already added'] ;
        $validator = validator::make($data , $rules , $message) ;
        if ($validator->passes()){
            $brand = new brand()  ;
            $brand->name = request('name') ;
            $brand->save();
            $request->session()->flash('success' , "brand ( $brand->name ) has been added successfully ") ;
            return redirect()->route('brands.list' , 'brand') ;
        }
        else {
            return redirect()->route('brands.create')->withErrors($validator)->withInput();
        }
    }
    public function show($id){
        $products = Product::query()->select(['id', 'image' , 'price', 'description' , 'cost' , 'gender_id' , 'size_id', 'type_id' , 'color_id', 'brand_id' , 'stock'])->orderBy('id' , 'desc')->where('brand_id' , "=" , "$id")->paginate(8) ;
        $brand = brand::query()->findOrFail($id) ;
  //        dd($brands) ;
        return view('brands.show' , compact('brand' , 'products')) ;
    }
    public function edit($id){
        $brand = brand::query()->findOrFail($id) ;
        $brands = brand::query()->orderBy('id' , 'desc')->paginate(10);

        return view('brands.edit' , compact('brand' , 'brands')) ;
    }
    public function update($id , Request $request ){
        $data = $request->all() ;
        $rules = ["name" => 'required'] ;

        $validator = validator::make($data , $rules) ;
        if ($validator->passes()){
            $brand = brand::query()->findOrFail($id)  ;
            $brand->name = request('name') ;
            $brand->save();
            $request->session()->flash('success' , "brand ( $brand->name ) has been updated successfully ") ;
            return redirect()->route('brands.list' , 'brand') ;
        }
        else {
            return redirect()->route('brands.edit' , $id)->withErrors($validator)->withInput();
        }
    }
    public function destroy(Request $request ,$id){
        $brand = brand::query()->findOrFail($id);
        $brand->delete() ;
        $request->session()->flash('success' , "brand ( $brand->name ) has been deleted successfully !") ;
        return redirect()->route('brands.list') ;
    }
    public function trash(brand $brand){
        $brands = $brand::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('brands.trash', compact('brands'));
    }
    public function restore(Request $request , $id){
        $brand = brand::onlyTrashed()->findOrFail($id);
        $brand->restore() ;
        $request->session()->flash('success' , "brand ( $brand->name ) has been restored successfully !") ;
        return redirect()->route('brands.trash') ;
    }
    public function fdelete(Request $request ,$id){
        $brand = brand::onlyTrashed()->findOrFail($id);
  //      $products = Product::where('brand_id', $id)->first() ;
  //      if(isset($customer->brand_id ) == $id){
  //          $request->session()->flash('success' , "brand ( $brand->name ) couldn't be deleted ") ;
  //      }
  //      else{
            $brand->forceDelete() ;
            $request->session()->flash('success' , "brand ( $brand->name ) has been deleted successfully !") ;
  //      }
        return redirect()->route('brands.trash') ;

    }
}
