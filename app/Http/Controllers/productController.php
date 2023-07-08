<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use App\Models\Product;
use App\Models\Gender ;
use App\Models\Size ;
use App\Models\Brand ;
use App\Models\Type ;
use App\Models\Color ;
use App\Models\Cart ;
class productController extends Controller
{
    public function list(){
        if (request('search')){
            $search = request('search');
            $products = Product::where('id', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->paginate(10)->withQueryString();
        }
        else{
            $products = Product::query()->latest('updated_at')->paginate(8) ;
        }
        return view('products.list' , compact('products'));
    }
    public function create(){
        $genders = Gender::query()->orderBy('name' , 'asc')->get() ;
        $sizes = Size::query()->orderBy('name' , 'asc')->get() ;
        $types = Type::query()->orderBy('name' , 'asc')->get() ;
        $colors = Color::query()->orderBy('name' , 'asc')->get() ;
        $brands = Brand::query()->orderBy('name' , 'asc')->get() ;

        return view('products.create' , compact('genders' , 'sizes' , 'types' , 'colors' , 'brands')) ;
    }
    public function store(Request $request){
        $data = $request->all() ;
        $rules = [
            'description' => 'required|max:100' ,
            'price' => 'required|numeric' ,
            'cost' => 'required|numeric' ,
            'stock' => 'required|numeric' ,
            'gender' => "required|notIn:0",
            'size' => "required|notIn:0",
            'brand' => "required|notIn:0",
            'type' => "required|notIn:0",
            'color' => "required|notIn:0",

        ] ;
        $message= [
            "max" => "Ooh that's the longest :attribute I ever seen !" ,
        ];
        $validator = Validator::make($data , $rules , $message) ;
        if ($validator->passes()){
            $product = new Product ;
            $product->price = request('price') ;
            $product->description = request('description') ;
            $product->cost = request('cost') ;
            $product->gender_id = request('gender') ;
            $product->size_id = request('size') ;
            $product->type_id = request('type') ;
            $product->color_id = request('color') ;
            $product->brand_id = request('brand') ;
            $product->stock = request('stock') ;
            if ($request->file('image')){
                $file = $request->file('image');
                $newFileName = str_replace(" ", "-", strtolower($product->description));
                $newFileName = $newFileName . "." . $file->getClientOriginalExtension();
                $file->storeAs('public/products', $newFileName);
                $product->image = $newFileName;
            }
            $product->save() ;
            $request->session()->flash('success' , "product ( $product->description ) has been added successfully") ;
            return redirect()->route('products.list') ;
        }
        else{
            return redirect()->route('products.create')->withErrors($validator)->withInput() ;

        }
    }
    public function show($id){
        $product = Product::query()->findOrFail($id) ;
        return view('products.show' , compact('product')) ;
    }
    public function edit($id){
        $product = Product::query()->findOrFail($id) ;
        $genders = Gender::query()->orderBy('name' , 'asc')->get() ;
        $sizes = Size::query()->orderBy('name' , 'asc')->get() ;
        $types = Type::query()->orderBy('name' , 'asc')->get() ;
        $colors = Color::query()->orderBy('name' , 'asc')->get() ;
        $brands = Brand::query()->orderBy('name' , 'asc')->get() ;

        return view('products.edit' , compact('product', 'genders' , 'sizes' , 'types' , 'colors' , 'brands')) ;
    }
    public function update($id , Request $request){
        $data = $request->all() ;
        $rules = [
            'description' => 'required|max:100' ,
            'price' => 'required|numeric' ,
            'cost' => 'required|numeric' ,
            'stock' => 'required|numeric' ,
            'gender' => "required|notIn:0",
            'size' => "required|notIn:0",
            'brand' => "required|notIn:0",
            'type' => "required|notIn:0",
            'color' => "required|notIn:0",

        ] ;
        $message= [
            "max" => "Ooh that's the longest :attribute I ever seen !" ,
        ];
        $validator = Validator::make($data , $rules , $message) ;
        if ($validator->passes()){
            $product =  Product::query()->findOrFail($id) ;
            $product->price = request('price') ;
            $product->description = request('description') ;
            $product->cost = request('cost') ;
            $product->gender_id = request('gender') ;
            $product->size_id = request('size') ;
            $product->type_id = request('type') ;
            $product->color_id = request('color') ;
            $product->brand_id = request('brand') ;
            $product->stock = request('stock') ;
            if ($request->file('image')){
                $file = $request->file('image');
                $newFileName = str_replace(" ", "-", strtolower($product->id));
                $newFileName = $newFileName . "." . $file->getClientOriginalExtension();
                $file->storeAs('public/products', $newFileName);
                $product->image = $newFileName;
            }
            $product->update() ;
            $request->session()->flash('success' , "product ( $product->description ) has been updated successfully") ;
            return redirect()->route('products.list') ;
        }
        else{
            return redirect()->route('products.create')->withErrors($validator)->withInput() ;

        }
    }
    public function delete($id , Request $request){
        $product = Product::query()->findOrFail($id) ;
        $product->deleteOrFail() ;
        $request->session()->flash('success' , "product ( $product->description ) has been deleted successfully") ;

        return redirect()->route('products.list') ;
    }
    public function trash(){
        $products = Product::onlyTrashed()->select(['id', 'image' , 'price', 'description' , 'cost' , 'gender_id' , 'size_id', 'type_id' , 'color_id', 'brand_id' , 'stock'])->orderBy('id' , 'desc')->paginate(8) ;
        return view('products.trash' , compact('products'));
    }
    public function restore($id , Request $request){
        $product = Product::onlyTrashed()->findOrFail($id) ;
        $product->restore() ;
        $request->session()->flash('success' , "product ( $product->description ) has been restored successfully") ;
        return redirect()->route('products.trash') ;
    }
    public function fdelete($id , Request $request){
        $product = Product::onlyTrashed()->findOrFail($id) ;
        $product->forceDelete() ;
        $request->session()->flash('success' , "product ( $product->description ) has been deleted successfully") ;
        return redirect()->route('products.trash') ;
    }
    public function cart(){


            $carts = Cart::query()->select(['id'])->get() ;
            $products = Product::query()->join('carts' , 'products.id' , '=' ,'carts.product' )->paginate(8) ;
        return view('products.cart' , compact('products'));
    }
    public function purchase(Request $request , $id){
        $invoice = 1 ;
        dd($invoice) ;
        $product = Product::query()->findOrFail($id) ;
        $cart = Cart::query()->findOrFail($id) ;
        if ($cart != true){
            dd($cart) ;
        }
        else{
            $purchase = new Cart() ;
            $purchase->product = $id ;
            $purchase->invoice = $invoice ;
            $purchase->save() ;
        }

        $request->session()->flash('success' , "product ( $product->description ) has been added to cart") ;
        return redirect()->route('products.list') ;


    }
}
