@extends('layout')
@section('title')
    Edit product
@endsection

@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <h1 class="fs-2 mt-4">Edit product</h1>
            <hr>
            <form class="col-6"  action="{{route('products.update' , $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class=" mb-4 col-4">
                        <input type="file" class="form-control py-3" name="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" @error('price') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="price" id="price" placeholder="price" value="{{ old('price' , "$product->price") }}" required >
                        <label for="price" class="mx-3">product price:</label>

                        @error('price')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-floating  mb-4  col-4">
                        <input type="text"   @error('cost') class=" form-control is-invalid" autofocus  @enderror class="form-control"  name="cost" id="cost" placeholder="cost" value="{{ old('cost' , "$product->cost") }}" required >
                        <label for="cost" class="mx-3">product cost:</label>

                        @error('cost')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-4 ">
                    <input type="text" @error('description') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="description" id="description" placeholder="description" value="{{ old('description' , "$product->description") }}" required>
                    <label for="description" class="mx-3">product description:</label>

                    @error('cost')
                    <p class="invalid-feedback fs-6"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-floating mb-4 col-4">
                        <select  class=" form-select @error('gender') is-invalid @enderror"  name="gender" id="gender">
                            <option value="0">--SELECT--</option>
                            @foreach($genders as $gender)
                                <option value="{{$gender->id}}" @if($product->gender->id == $gender->id){{'SELECTED'}}@endif >{{ $gender->name }}</option>
                            @endforeach
                        </select>
                        <label for="gender" class="mx-3">Gender:</label>
                        @error('gender')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select  class=" form-select @error('type') is-invalid @enderror"  name="type" id="type">
                            <option value="0">--SELECT--</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" @if($product->type->id == $type->id){{'SELECTED'}}@endif >{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <label for="type" class="mx-3">Type:</label>
                        @error('type')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select  class=" form-select @error('color') is-invalid @enderror"  name="color" id="color">
                            <option value="0">--SELECT--</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}" @if($product->color->id == $color->id){{'SELECTED'}}@endif >{{ $color->name }}</option>
                            @endforeach
                        </select>
                        <label for="color" class="mx-3">color:</label>
                        @error('color')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-floating mb-4 col-4">
                        <select  class=" form-select @error('size') is-invalid @enderror"  name="size" id="size">
                            <option value="0">--SELECT--</option>
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}" @if($product->size->id == $size->id){{'SELECTED'}}@endif >{{ $size->name }}</option>
                            @endforeach
                        </select>
                        <label for="size" class="mx-3">size:</label>
                        @error('size')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-floating mb-4 col-4">
                        <select  class=" form-select @error('brand') is-invalid @enderror"  name="brand" id="brand">
                            <option value="0">--SELECT--</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if($product->brand->id == $brand->id){{'SELECTED'}}@endif >{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <label for="brand" class="mx-3">Brand:</label>
                        @error('brand')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-floating mb-4 col-4 ">
                        <input type="text" @error('stock') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="stock" id="stock" placeholder="stock" value="{{ old('stock' , "$product->stock") }}" required>
                        <label for="stock" class="mx-3">product stock:</label>
                        @error('stock')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                </div>

                <button type="submit"class="btn btn-success col-3" name="button">Update</button>
                <a href="{{route('products.list')}}" class="btn btn-outline-primary col-3">products list</a>
            </form>
            <div class=" col-6">
                <p class="alert alert-secondary">Enter valid data please .</p>

            </div>
        </div>
    </div>
@endsection
