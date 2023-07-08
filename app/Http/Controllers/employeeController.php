<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee ;
use App\Models\City ;
use Illuminate\Support\Facades\validator;


class employeeController extends Controller
{
//  public function __construct(){
//      $this->middleware(['auth']);
//  }

  public function list(){
      if(request('search')){
          $search = request('search') ;
          $employees = Employee::where('name', 'like', "%$search%")->orWhere('id', 'like', "%$search%")->orWhere('phone', 'like', "%$search%")->orWhere('email', 'like', "%$search%")->orWhere('address', 'like', "%$search%")->paginate(10)->withQueryString();
      }
      else{
          $employees = employee::query()->select(['id', 'name', 'phone' , 'email' , 'address' , 'city_id'])->orderBy('id' , 'desc')->paginate(10) ;
      }
      return view('employees.list' , compact('employees')) ;
  }


  public function create(){
      $cities = City::all() ;
      return view('employees.create' , compact('cities')) ;
  }


  public function store(Request $request){
      $data = $request->all() ;
      $rules = [
          'name' => 'required|max:50|regex:/^[a-zA-Z ]+$/' ,
          'phone' => 'required|numeric' ,
          'email' => 'required|unique:employees,email|max:100|email:rfc,dns' ,
          'city' => "required|notIn:0"
      ] ;
      $message= [
          "max" => "Ooh that's the longest :attribute I ever seen !" ,
          "notIn" => "Please select a :attribute" ,
          "regex" => "The :attribute must contain only letters "
      ];
      $validator = Validator::make($data , $rules , $message ) ;
      if ($validator->passes()){
          $employee = new employee() ;
          $employee->name = request('name') ;
          $employee->phone = request('phone') ;
          $employee->email = request('email') ;
          $employee->address = request('address') ;
          $employee->city_id = request('city') ;

          $employee->save() ;
          $request->session()->flash('success' , " employee ( $employee->name ) has been added successfully !") ;
//            dd($employee) ;
          return redirect()->route('employees.list' ) ;
      }
      else{
          return redirect()->route('employees.create')->withErrors($validator)->withInput() ;
      }


  }

  public function show($id){
      $employee = employee::query()->findOrFail($id) ;
      return view('employees.show' , compact('employee'));
  }


  public function edit($id){
      $employee = employee::query()->findOrFail($id) ;
      $cities = City::all() ;

      return view('employees.edit' , compact("employee" , 'cities')) ;
  }


  public function update( $id , Request $request){
      $data = $request->all() ;
      $rules = [
          'name' => 'required|max:50' ,
          'phone' => 'required|max:50' ,
          'email' => 'required|max:100' ,
          'address' => 'required',
                      'city' => "required|notIn:0"


      ] ;
      $message= [
          "max" => "ooh that's the longest :attribute I ever seen !",
                      "notIn" => "Please select a :attribute" ,

      ];
      $validator = Validator::make($data , $rules , $message ) ;
      if ($validator->passes()){
          $employee =  employee::query()->findOrFail($id) ;
          $employee->name = request('name') ;
          $employee->phone = request('phone') ;
          $employee->email = request('email') ;
          $employee->address = request('address') ;
          $employee->city_id = request('city') ;
          $employee->save() ;
          $request->session()->flash('success' , " employee ( $employee->name ) has been updated successfully !") ;
          return redirect()->route('employees.list' ) ;
      }
      else{
          return redirect()->route('employees.edit' , $id)->withErrors($validator)->withInput() ;
      }
  }


  public function destroy($id , Request $request){
      $employee = employee::query()->findOrFail($id) ;
      $employee->delete() ;
      $request->session()->flash('success' , " employee ( $employee->name ) has been deleted successfully !") ;

      return redirect()->route('employees.list') ;
  }
  public function trash(){
      $employees = employee::onlyTrashed()->paginate(8);
      return view('employees.trash' , compact('employees')) ;
  }
  public function restore($id){
      $employee = employee::withTrashed()->findOrFail($id);
      $employee->restore() ;
      return redirect()->route('employees.trash') ;
  }
  public function fdelete($id){
      $employee = employee::withTrashed()->findOrFail($id);
      $employee->forceDelete() ;
      return redirect()->route('employees.trash') ;
  }
}
