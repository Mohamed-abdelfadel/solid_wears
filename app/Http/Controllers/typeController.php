<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\validator;
class typeController extends Controller
{
  //  public function __construct(){
  //      $this->middleware(['auth']);
  //  }
    public function list(){
        if (request('search')){
            $search = request('search');
            $types = type::where('name' , 'like' , "%$search%")->paginate(8)->withQueryString();
        }
        else{
            $types = type::query()->orderBy('id' , 'desc')->paginate(10);

        }

        return view('types.list', compact('types')) ;
    }
    public function create(){
        $types = type::query()->orderBy('id' , 'desc')->paginate(10);

        return view('types.create' , compact('types')) ;
    }
    public function store(Request $request){
        $data = $request->all() ;
        $rules = ["name" => 'required|unique:types,name'] ;
        $message = ["unique" => 'This type is already added'] ;
        $validator = validator::make($data , $rules , $message) ;
        if ($validator->passes()){
            $type = new type()  ;
            $type->name = request('name') ;
            $type->save();
            $request->session()->flash('success' , "type ( $type->name ) has been added successfully ") ;
            return redirect()->route('types.list' , 'type') ;
        }
        else {
            return redirect()->route('types.create')->withErrors($validator)->withInput();
        }
    }
    public function show($id){
        $type = type::query()->findOrFail($id) ;
        $products = Product::query()->select(['id', 'image' , 'price', 'description' , 'cost' , 'gender_id' , 'size_id', 'type_id' , 'color_id', 'brand_id' , 'stock'])->orderBy('id' , 'desc')->where('type_id' , "=" , "$id")->paginate(8) ;
        return view('types.show' , compact('type' , 'products')) ;
    }
    public function edit($id){
        $type = type::query()->findOrFail($id) ;
        $types = type::query()->orderBy('id' , 'desc')->paginate(10);

        return view('types.edit' , compact('type' , 'types')) ;
    }
    public function update($id , Request $request ){
        $data = $request->all() ;
        $rules = ["name" => 'required'] ;

        $validator = validator::make($data , $rules) ;
        if ($validator->passes()){
            $type = type::query()->findOrFail($id)  ;
            $type->name = request('name') ;
            $type->save();
            $request->session()->flash('success' , "type ( $type->name ) has been updated successfully ") ;
            return redirect()->route('types.list' , 'type') ;
        }
        else {
            return redirect()->route('types.edit' , $id)->withErrors($validator)->withInput();
        }
    }
    public function destroy(Request $request ,$id){
        $type = type::query()->findOrFail($id);
        $type->delete() ;
        $request->session()->flash('success' , "type ( $type->name ) has been deleted successfully !") ;
        return redirect()->route('types.list') ;
    }
    public function trash(type $type){
        $types = $type::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('types.trash', compact('types'));
    }
    public function restore(Request $request , $id){
        $type = type::onlyTrashed()->findOrFail($id);
        $type->restore() ;
        $request->session()->flash('success' , "type ( $type->name ) has been restored successfully !") ;
        return redirect()->route('types.trash') ;
    }
    public function fdelete(Request $request ,$id){
        $type = type::onlyTrashed()->findOrFail($id);
  //      $products = Product::where('type_id', $id)->first() ;
  //      if(isset($customer->type_id ) == $id){
  //          $request->session()->flash('success' , "type ( $type->name ) couldn't be deleted ") ;
  //      }
  //      else{
            $type->forceDelete() ;
            $request->session()->flash('success' , "type ( $type->name ) has been deleted successfully !") ;
  //      }
        return redirect()->route('types.trash') ;

    }
}
