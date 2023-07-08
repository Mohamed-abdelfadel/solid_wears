<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Product ;
use Illuminate\Support\Facades\validator;
class colorController extends Controller
{
  //  public function __construct(){
  //      $this->middleware(['auth']);
  //  }
    public function list(){
        if (request('search')){
            $search = request('search');
            $colors = color::where('name' , 'like' , "%$search%")->paginate(8)->withQueryString();
        }
        else{
            $colors = color::query()->orderBy('id' , 'desc')->paginate(10);

        }

        return view('colors.list', compact('colors')) ;
    }
    public function create(){
        $colors = color::query()->orderBy('id' , 'desc')->paginate(10);

        return view('colors.create' , compact('colors')) ;
    }
    public function store(Request $request){
        $data = $request->all() ;
        $rules = [
            "name" => 'required|unique:colors,name' ,
            "hex"=> "required"] ;
        $message = ["unique" => 'This color is already added'] ;
        $validator = validator::make($data , $rules , $message) ;
        if ($validator->passes()){
            $color = new color()  ;
            $color->name = request('name') ;
            $color->hex = request('hex') ;

            $color->save();
            $request->session()->flash('success' , "color ( $color->name ) has been added successfully ") ;
            return redirect()->route('colors.list' , 'color') ;
        }
        else {
            return redirect()->route('colors.create')->withErrors($validator)->withInput();
        }
    }
    public function show($id){
        $color = color::query()->findOrFail($id) ;
        $products = Product::query()->select(['id', 'image' , 'price', 'description' , 'cost' , 'gender_id' , 'size_id', 'type_id' , 'color_id', 'brand_id' , 'stock'])->orderBy('id' , 'desc')->where('color_id' , "=" , "$id")->paginate(8) ;
        return view('colors.show' , compact('color' , 'products')) ;
    }
    public function edit($id){
        $color = color::query()->findOrFail($id) ;
        $colors = color::query()->orderBy('id' , 'desc')->paginate(10);

        return view('colors.edit' , compact('color' , 'colors')) ;
    }
    public function update($id , Request $request ){
        $data = $request->all() ;
        $rules = [
            "name" => 'required',
            "hex" => "required"
        ] ;

        $validator = validator::make($data , $rules) ;
        if ($validator->passes()){
            $color = color::query()->findOrFail($id)  ;
            $color->name = request('name') ;
            $color->hex = request('hex') ;
            $color->save();
            $request->session()->flash('success' , "color ( $color->name ) has been updated successfully ") ;
            return redirect()->route('colors.list' , 'color') ;
        }
        else {
            return redirect()->route('colors.edit' , $id)->withErrors($validator)->withInput();
        }
    }
    public function destroy(Request $request ,$id){
        $color = color::query()->findOrFail($id);
        $color->delete() ;
        $request->session()->flash('success' , "color ( $color->name ) has been deleted successfully !") ;
        return redirect()->route('colors.list') ;
    }
    public function trash(color $color){
        $colors = $color::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('colors.trash', compact('colors'));
    }
    public function restore(Request $request , $id){
        $color = color::onlyTrashed()->findOrFail($id);
        $color->restore() ;
        $request->session()->flash('success' , "color ( $color->name ) has been restored successfully !") ;
        return redirect()->route('colors.trash') ;
    }
    public function fdelete(Request $request ,$id){
        $color = color::onlyTrashed()->findOrFail($id);
  //      $products = Product::where('color_id', $id)->first() ;
  //      if(isset($customer->color_id ) == $id){
  //          $request->session()->flash('success' , "color ( $color->name ) couldn't be deleted ") ;
  //      }
  //      else{
            $color->forceDelete() ;
            $request->session()->flash('success' , "color ( $color->name ) has been deleted successfully !") ;
  //      }
        return redirect()->route('colors.trash') ;

    }
}
