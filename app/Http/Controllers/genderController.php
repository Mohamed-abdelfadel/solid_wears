<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Gender ;
use Illuminate\Support\Facades\validator;
class genderController extends Controller
{
//  public function __construct(){
//      $this->middleware(['auth']);
//  }
  public function list(){
      if (request('search')){
          $search = request('search');
          $genders = gender::where('name' , 'like' , "%$search%")->paginate(8)->withQueryString();
      }
      else{
          $genders = gender::query()->orderBy('id' , 'desc')->paginate(10);

      }

      return view('genders.list', compact('genders')) ;
  }
  public function create(){
      $genders = gender::query()->orderBy('id' , 'desc')->paginate(10);

      return view('genders.create' , compact('genders')) ;
  }
  public function store(Request $request){
      $data = $request->all() ;
      $rules = ["name" => 'required|unique:genders,name'] ;
      $message = ["unique" => 'This gender is already added'] ;
      $validator = validator::make($data , $rules , $message) ;
      if ($validator->passes()){
          $gender = new gender()  ;
          $gender->name = request('name') ;
          $gender->save();
          $request->session()->flash('success' , "gender ( $gender->name ) has been added successfully ") ;
          return redirect()->route('genders.list' , 'gender') ;
      }
      else {
          return redirect()->route('genders.create')->withErrors($validator)->withInput();
      }
  }
  public function show($id){
      $products = Product::query()->select(['id', 'image' , 'price', 'description' , 'cost' , 'gender_id' , 'size_id', 'type_id' , 'color_id', 'brand_id' , 'stock'])->orderBy('id' , 'desc')->where('gender_id' , "=" , "$id")->paginate(8) ;
      $gender = gender::query()->findOrFail($id) ;
      return view('genders.show' , compact('gender' , 'products')) ;
  }
  public function edit($id){
      $gender = gender::query()->findOrFail($id) ;
      $genders = gender::query()->orderBy('id' , 'desc')->paginate(10);

      return view('genders.edit' , compact('gender' , 'genders')) ;
  }
  public function update($id , Request $request ){
      $data = $request->all() ;
      $rules = ["name" => 'required'] ;

      $validator = validator::make($data , $rules) ;
      if ($validator->passes()){
          $gender = gender::query()->findOrFail($id)  ;
          $gender->name = request('name') ;
          $gender->save();
          $request->session()->flash('success' , "gender ( $gender->name ) has been updated successfully ") ;
          return redirect()->route('genders.list' , 'gender') ;
      }
      else {
          return redirect()->route('genders.edit' , $id)->withErrors($validator)->withInput();
      }
  }
  public function destroy(Request $request ,$id){
      $gender = gender::query()->findOrFail($id);
      $gender->delete() ;
      $request->session()->flash('success' , "gender ( $gender->name ) has been deleted successfully !") ;
      return redirect()->route('genders.list') ;
  }
  public function trash(gender $gender){
      $genders = $gender::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
      return view('genders.trash', compact('genders'));
  }
  public function restore(Request $request , $id){
      $gender = gender::onlyTrashed()->findOrFail($id);
      $gender->restore() ;
      $request->session()->flash('success' , "gender ( $gender->name ) has been restored successfully !") ;
      return redirect()->route('genders.trash') ;
  }
  public function fdelete(Request $request ,$id){
      $gender = gender::onlyTrashed()->findOrFail($id);
//      $products = Product::where('gender_id', $id)->first() ;
//      if(isset($customer->gender_id ) == $id){
//          $request->session()->flash('success' , "gender ( $gender->name ) couldn't be deleted ") ;
//      }
//      else{
          $gender->forceDelete() ;
          $request->session()->flash('success' , "gender ( $gender->name ) has been deleted successfully !") ;
//      }
      return redirect()->route('genders.trash') ;

  }
}
