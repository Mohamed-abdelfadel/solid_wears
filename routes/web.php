<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\cityController;
use App\Http\Controllers\employeeController ;
use App\Http\Controllers\publicController ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendorController ;
use App\Http\Controllers\productController ;
use App\Http\Controllers\genderController ;
use App\Http\Controllers\sizeController ;
use App\Http\Controllers\brandController ;
use App\Http\Controllers\typeController ;
use App\Http\Controllers\colorController ;
use App\Http\Controllers\BarcodeController ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [publicController::class , 'dashboard'])->name('dashboard');;
Route::get('/', [publicController::class , 'welcome'])->name('welcome') ;


//customers routes
Route::get('/customers' , [customerController::class , 'list'])->name('customers.list') ;
Route::get('/customers/trash' , [customerController::class , 'trash'])->name('customers.trash') ;
Route::get('/customers/restore/{id}' , [customerController::class , 'restore'])->name('customers.restore') ;
Route::get('/customers/fdelete/{id}' , [customerController::class , 'fdelete'])->name('customers.fdelete') ;

Route::get('/customer/show/{id}' , [customerController::class , 'show'])->name('customers.show') ;
Route::get('/customer/create' , [customerController::class , 'create'])->name('customers.create') ;
Route::post('customer/store' , [customerController::class , 'store'])->name('customers.store') ;
Route::get('/customer/edit/{id}' ,[ customerController::class , 'edit'])->name('customers.edit') ;
Route::put('/customer/edit/{id}' , [customerController::class , 'update'])->name('customers.update') ;
Route::delete('/customers/delete/{id}' , [ customerController::class , 'destroy'])->name('customers.destroy') ;

//cities routes

Route::get('/cities' , [cityController::class , 'list' ])->name('cities.list') ;
Route::get('/cities/create' , [cityController::class , 'create' ])->name('cities.create') ;
Route::post('/cities/store' , [cityController::class , 'store' ])->name('cities.store') ;
Route::get('/cities/show/{id}' , [cityController::class , 'show' ])->name('cities.show') ;
Route::get('/cities/edit/{id}' , [cityController::class , 'edit' ])->name('cities.edit') ;
Route::put('/cities/edit/{id}' , [cityController::class , 'update' ])->name('cities.update') ;
Route::delete('/cities/delete/{id}' , [ cityController::class , 'destroy'])->name('cities.destroy') ;
Route::get('/cities/trash' , [cityController::class , 'trash'])->name('cities.trash') ;
Route::get('/cities/restore/{id}' , [cityController::class , 'restore'])->name('cities.restore') ;
Route::get('/cities/fdelete/{id}' , [cityController::class , 'fdelete'])->name('cities.fdelete') ;

//employees routes
Route::get('/employees' , [employeeController::class , 'list'])->name('employees.list') ;
Route::get('/employee/trash' , [employeeController::class , 'trash'])->name('employees.trash') ;
Route::get('/employee/restore/{id}' , [employeeController::class , 'restore'])->name('employees.restore') ;
Route::get('/employee/fdelete/{id}' , [employeeController::class , 'fdelete'])->name('employees.fdelete') ;

Route::get('/employee/show/{id}' , [employeeController::class , 'show'])->name('employees.show') ;
Route::get('/employee/create' , [employeeController::class , 'create'])->name('employees.create') ;
Route::post('employee/store' , [employeeController::class , 'store'])->name('employees.store') ;
Route::get('/employee/edit/{id}' ,[ employeeController::class , 'edit'])->name('employees.edit') ;
Route::put('/employee/edit/{id}' , [employeeController::class , 'update'])->name('employees.update') ;
Route::delete('/employees/delete/{id}' , [ employeeController::class , 'destroy'])->name('employees.destroy') ;

//vendors routes
Route::get('/vendors' , [vendorController::class , 'list'])->name('vendors.list') ;
Route::get('/vendors/trash' , [vendorController::class , 'trash'])->name('vendors.trash') ;
Route::get('/vendors/restore/{id}' , [vendorController::class , 'restore'])->name('vendors.restore') ;
Route::get('/vendors/fdelete/{id}' , [vendorController::class , 'fdelete'])->name('vendors.fdelete') ;

Route::get('/vendor/show/{id}' , [vendorController::class , 'show'])->name('vendors.show') ;
Route::get('/vendor/create' , [vendorController::class , 'create'])->name('vendors.create') ;
Route::post('vendor/store' , [vendorController::class , 'store'])->name('vendors.store') ;
Route::get('/vendor/edit/{id}' ,[ vendorController::class , 'edit'])->name('vendors.edit') ;
Route::put('/vendor/edit/{id}' , [vendorController::class , 'update'])->name('vendors.update') ;
Route::delete('/vendors/delete/{id}' , [ vendorController::class , 'destroy'])->name('vendors.destroy') ;

//products
Route::get('/products' , [ productController::class , 'list' ])->name('products.list') ;
Route::get('/products/create' , [ productController::class , 'create' ])->name('products.create') ;
Route::post('/products/create' , [ productController::class , 'store' ])->name('products.store') ;
Route::get('/products/show/{id}' , [ productController::class , 'show' ])->name('products.show') ;
Route::get('/products/edit/{id}' , [ productController::class , 'edit' ])->name('products.edit') ;
Route::put('/products/edit/{id}' , [ productController::class , 'update' ])->name('products.update') ;
Route::delete('/products/delete/{id}' , [productController::class , 'delete'])->name('products.delete') ;
Route::get('/products/trash}' , [ productController::class , 'trash' ])->name('products.trash') ;
Route::get('/products/restore/{id}' , [ productController::class , 'restore' ])->name('products.restore') ;
Route::get('/products/fdelete/{id}' , [ productController::class , 'fdelete' ])->name('products.fdelete') ;
Route::get('/products/purchase/{id}' , [ productController::class , 'purchase' ])->name('products.purchase') ;
Route::get('/products/cart' , [ productController::class , 'cart' ])->name('products.cart') ;

//genders

Route::get('/genders' , [genderController::class , 'list' ])->name('genders.list') ;
Route::get('/genders/create' , [genderController::class , 'create' ])->name('genders.create') ;
Route::post('/genders/store' , [genderController::class , 'store' ])->name('genders.store') ;
Route::get('/genders/show/{id}' , [genderController::class , 'show' ])->name('genders.show') ;
Route::get('/genders/edit/{id}' , [genderController::class , 'edit' ])->name('genders.edit') ;
Route::put('/genders/edit/{id}' , [genderController::class , 'update' ])->name('genders.update') ;
Route::delete('/genders/delete/{id}' , [ genderController::class , 'destroy'])->name('genders.destroy') ;
Route::get('/genders/trash' , [genderController::class , 'trash'])->name('genders.trash') ;
Route::get('/genders/restore/{id}' , [genderController::class , 'restore'])->name('genders.restore') ;
Route::get('/genders/fdelete/{id}' , [genderController::class , 'fdelete'])->name('genders.fdelete') ;


//sizes

Route::get('/sizes' , [sizeController::class , 'list' ])->name('sizes.list') ;
Route::get('/sizes/create' , [sizeController::class , 'create' ])->name('sizes.create') ;
Route::post('/sizes/store' , [sizeController::class , 'store' ])->name('sizes.store') ;
Route::get('/sizes/show/{id}' , [sizeController::class , 'show' ])->name('sizes.show') ;
Route::get('/sizes/edit/{id}' , [sizeController::class , 'edit' ])->name('sizes.edit') ;
Route::put('/sizes/edit/{id}' , [sizeController::class , 'update' ])->name('sizes.update') ;
Route::delete('/sizes/delete/{id}' , [ sizeController::class , 'destroy'])->name('sizes.destroy') ;
Route::get('/sizes/trash' , [sizeController::class , 'trash'])->name('sizes.trash') ;
Route::get('/sizes/restore/{id}' , [sizeController::class , 'restore'])->name('sizes.restore') ;
Route::get('/sizes/fdelete/{id}' , [sizeController::class , 'fdelete'])->name('sizes.fdelete') ;
//brands

Route::get('/brands' , [brandController::class , 'list' ])->name('brands.list') ;
Route::get('/brands/create' , [brandController::class , 'create' ])->name('brands.create') ;
Route::post('/brands/store' , [brandController::class , 'store' ])->name('brands.store') ;
Route::get('/brands/show/{id}' , [brandController::class , 'show' ])->name('brands.show') ;
Route::get('/brands/edit/{id}' , [brandController::class , 'edit' ])->name('brands.edit') ;
Route::put('/brands/edit/{id}' , [brandController::class , 'update' ])->name('brands.update') ;
Route::delete('/brands/delete/{id}' , [ brandController::class , 'destroy'])->name('brands.destroy') ;
Route::get('/brands/trash' , [brandController::class , 'trash'])->name('brands.trash') ;
Route::get('/brands/restore/{id}' , [brandController::class , 'restore'])->name('brands.restore') ;
Route::get('/brands/fdelete/{id}' , [brandController::class , 'fdelete'])->name('brands.fdelete') ;

//types
Route::get('/types' , [typeController::class , 'list' ])->name('types.list') ;
Route::get('/types/create' , [typeController::class , 'create' ])->name('types.create') ;
Route::post('/types/store' , [typeController::class , 'store' ])->name('types.store') ;
Route::get('/types/show/{id}' , [typeController::class , 'show' ])->name('types.show') ;
Route::get('/types/edit/{id}' , [typeController::class , 'edit' ])->name('types.edit') ;
Route::put('/types/edit/{id}' , [typeController::class , 'update' ])->name('types.update') ;
Route::delete('/types/delete/{id}' , [ typeController::class , 'destroy'])->name('types.destroy') ;
Route::get('/types/trash' , [typeController::class , 'trash'])->name('types.trash') ;
Route::get('/types/restore/{id}' , [typeController::class , 'restore'])->name('types.restore') ;
Route::get('/types/fdelete/{id}' , [typeController::class , 'fdelete'])->name('types.fdelete') ;


//colors
Route::get('/colors' , [colorController::class , 'list' ])->name('colors.list') ;
Route::get('/colors/create' , [colorController::class , 'create' ])->name('colors.create') ;
Route::post('/colors/store' , [colorController::class , 'store' ])->name('colors.store') ;
Route::get('/colors/show/{id}' , [colorController::class , 'show' ])->name('colors.show') ;
Route::get('/colors/edit/{id}' , [colorController::class , 'edit' ])->name('colors.edit') ;
Route::put('/colors/edit/{id}' , [colorController::class , 'update' ])->name('colors.update') ;
Route::delete('/colors/delete/{id}' , [ colorController::class , 'destroy'])->name('colors.destroy') ;
Route::get('/colors/trash' , [colorController::class , 'trash'])->name('colors.trash') ;
Route::get('/colors/restore/{id}' , [colorController::class , 'restore'])->name('colors.restore') ;
Route::get('/colors/fdelete/{id}' , [colorController::class , 'fdelete'])->name('colors.fdelete') ;


Route::get('/barcode', [BarcodeController::class, 'index'])->name('barcode');
require __DIR__.'/auth.php';
