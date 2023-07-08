<?php

namespace App\Http\Controllers;
use App\Models\City  ;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class cityController extends Controller
{
//    public function __construct(){
//        $this->middleware(['auth']);
//    }
    public function list(){
        if (request('search')){
            $search = request(['search']);
            $cities = City::latest()->filter($search)->paginate(10)->withQueryString() ;
        }
        else{
            $cities = City::query()->orderBy('id' , 'desc')->paginate(10);

        }

        return view('cities.list', compact('cities')) ;
    }
    public function create(){
        $cities = City::query()->orderBy('id' , 'desc')->paginate(10);

        return view('cities.create' , compact('cities')) ;
    }
    public function store(Request $request){
        $data = $request->all() ;
        $rules = ["name" => 'required|unique:cities,name'] ;
        $message = ["unique" => 'This city is already added'] ;
        $validator = validator::make($data , $rules , $message) ;
        if ($validator->passes()){
            $city = new City()  ;
            $city->name = request('name') ;
            $city->save();
            $request->session()->flash('success' , "City ( $city->name ) has been added successfully ") ;
            return redirect()->route('cities.list' , 'city') ;
        }
        else {
            return redirect()->route('cities.create')->withErrors($validator)->withInput();
        }
    }
    public function show($id){
        $city = City::query()->findOrFail($id) ;
        $customers = Customer::query()->orderBy('name' , 'asc')->where('city_id' , '=' , "$id")->paginate(10, '*', 'customers');
        $employees = Employee::query()->orderBy('name' , 'asc')->where('city_id' , '=' , "$id")->paginate(10, '*', 'employees');
        $vendors =   Vendor::query()->orderBy('name' , 'asc')->where('city_id' , '=' , "$id")->paginate(10, '*', 'vendors');
//        dd($cities) ;
        return view('cities.show' , compact('city' , 'customers' , 'employees' , 'vendors')) ;
    }
    public function edit($id){
        $city = City::query()->findOrFail($id) ;
        $cities = City::query()->orderBy('id' , 'desc')->paginate(10);

        return view('cities.edit' , compact('city' , 'cities')) ;
    }
    public function update($id , Request $request ){
        $data = $request->all() ;
        $rules = ["name" => 'required'] ;

        $validator = validator::make($data , $rules) ;
        if ($validator->passes()){
            $city = City::query()->findOrFail($id)  ;
            $city->name = request('name') ;
            $city->save();
            $request->session()->flash('success' , "City ( $city->name ) has been updated successfully ") ;
            return redirect()->route('cities.list' , 'city') ;
        }
        else {
            return redirect()->route('cities.edit' , $id)->withErrors($validator)->withInput();
        }
    }
    public function destroy(Request $request ,$id){
        $city = City::query()->findOrFail($id);
        $city->delete() ;
        $request->session()->flash('success' , "City ( $city->name ) has been deleted successfully !") ;
        return redirect()->route('cities.list') ;
    }
    public function trash(City $city){
        $cities = $city::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('cities.trash', compact('cities'));
    }
    public function restore(Request $request , $id){
        $city = City::onlyTrashed()->findOrFail($id);
        $city->restore() ;
        $request->session()->flash('success' , "City ( $city->name ) has been restored successfully !") ;
        return redirect()->route('cities.trash') ;
    }
    public function fdelete(Request $request ,$id){
        $city = City::onlyTrashed()->findOrFail($id);
        $customer = Customer::where('city_id', $id)->first() ;
        if(isset($customer->city_id ) == $id){
            $request->session()->flash('success' , "City ( $city->name ) couldn't be deleted ") ;
        }
        else{
            $city->forceDelete() ;
            $request->session()->flash('success' , "City ( $city->name ) has been deleted successfully !") ;
        }
        return redirect()->route('cities.trash') ;

    }
}
