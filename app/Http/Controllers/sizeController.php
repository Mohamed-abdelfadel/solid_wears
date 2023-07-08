<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\validator;

class sizeController extends Controller
{
  //  public function __construct(){
  //      $this->middleware(['auth']);
  //  }
    public function list(){
        if (request('search')){
            $search = request('search');
            $sizes = size::where('name' , 'like' , "%$search%")->paginate(8)->withQueryString();
        }
        else{
            $sizes = size::query()->orderBy('id' , 'desc')->paginate(10);

        }

        return view('sizes.list', compact('sizes')) ;
    }
    public function create(){
        $sizes = size::query()->orderBy('id' , 'desc')->paginate(10);

        return view('sizes.create' , compact('sizes')) ;
    }
    public function store(Request $request){
        $data = $request->all() ;
        $rules = ["name" => 'required|unique:sizes,name'] ;
        $message = ["unique" => 'This size is already added'] ;
        $validator = validator::make($data , $rules , $message) ;
        if ($validator->passes()){
            $size = new size()  ;
            $size->name = request('name') ;
            $size->save();
            $request->session()->flash('success' , "size ( $size->name ) has been added successfully ") ;
            return redirect()->route('sizes.list' , 'size') ;
        }
        else {
            return redirect()->route('sizes.create')->withErrors($validator)->withInput();
        }
    }
    public function show($id){
        $size = size::query()->findOrFail($id) ;
        $products = Product::query()->select(['id', 'image' , 'price', 'description' , 'cost' , 'gender_id' , 'size_id', 'type_id' , 'color_id', 'brand_id' , 'stock'])->orderBy('id' , 'desc')->where('size_id' , "=" , "$id")->paginate(8) ;
        return view('sizes.show' , compact('size' , 'products')) ;
    }
    public function edit($id){
        $size = size::query()->findOrFail($id) ;
        $sizes = size::query()->orderBy('id' , 'desc')->paginate(10);

        return view('sizes.edit' , compact('size' , 'sizes')) ;
    }
    public function update($id , Request $request ){
        $data = $request->all() ;
        $rules = ["name" => 'required'] ;

        $validator = validator::make($data , $rules) ;
        if ($validator->passes()){
            $size = size::query()->findOrFail($id)  ;
            $size->name = request('name') ;
            $size->save();
            $request->session()->flash('success' , "size ( $size->name ) has been updated successfully ") ;
            return redirect()->route('sizes.list' , 'size') ;
        }
        else {
            return redirect()->route('sizes.edit' , $id)->withErrors($validator)->withInput();
        }
    }
    public function destroy(Request $request ,$id){
        $size = size::query()->findOrFail($id);
        $size->delete() ;
        $request->session()->flash('success' , "size ( $size->name ) has been deleted successfully !") ;
        return redirect()->route('sizes.list') ;
    }
    public function trash(size $size){
        $sizes = $size::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('sizes.trash', compact('sizes'));
    }
    public function restore(Request $request , $id){
        $size = size::onlyTrashed()->findOrFail($id);
        $size->restore() ;
        $request->session()->flash('success' , "size ( $size->name ) has been restored successfully !") ;
        return redirect()->route('sizes.trash') ;
    }
    public function fdelete(Request $request ,$id){
        $size = size::onlyTrashed()->findOrFail($id);
  //      $products = Product::where('size_id', $id)->first() ;
  //      if(isset($customer->size_id ) == $id){
  //          $request->session()->flash('success' , "size ( $size->name ) couldn't be deleted ") ;
  //      }
  //      else{
            $size->forceDelete() ;
            $request->session()->flash('success' , "size ( $size->name ) has been deleted successfully !") ;
  //      }
        return redirect()->route('sizes.trash') ;

    }
}
