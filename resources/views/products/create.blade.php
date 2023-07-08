@extends('layout')
@section('title')
    New product
@endsection

@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <h1 class="fs-2 mt-4">New product</h1>
            <hr>
            <form class="col-6"  action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class=" mb-4 col-4">
                        <input type="file" class="form-control py-3" name="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" @error('price') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="price" id="price" placeholder="price" value="{{ old('price') }}" required >
                        <label for="price" class="mx-3">product price:</label>

                        @error('price')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-floating  mb-4  col-4">
                        <input type="text"   @error('cost') class=" form-control is-invalid" autofocus  @enderror class="form-control"  name="cost" id="cost" placeholder="cost" value="{{ old('cost') }}" required >
                        <label for="cost" class="mx-3">product cost:</label>

                        @error('cost')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-4 ">
                    <input type="text" @error('description') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="description" id="description" placeholder="description" value="{{ old('description') }}" required>
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
                                <option value="{{$gender->id}}"@selected(old('gender') == $gender->id)>{{ $gender->name }}</option>
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
                                <option value="{{$type->id}}"@selected(old('type') == $type->id)>{{ $type->name }}</option>
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
                                <option value="{{$color->id}}"@selected(old('color') == $color->id)>{{ $color->name }}</option>
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
                                <option value="{{$size->id}}"@selected(old('size') == $size->id)>{{ $size->name }}</option>
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
                                <option value="{{$brand->id}}"@selected(old('brand') == $brand->id)>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <label for="brand" class="mx-3">Brand:</label>
                        @error('brand')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-floating mb-4 col-4 ">
                        <input type="text" @error('stock') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="stock" id="stock" placeholder="stock" value="{{ old('stock') }}" required>
                        <label for="stock" class="mx-3">product stock:</label>
                        @error('stock')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                </div>

                <button type="submit"class="btn btn-success col-3" name="button">Create</button>
                <a href="{{route('products.list')}}" class="btn btn-outline-primary col-3">products list</a>
            </form>
            <div class=" col-6">
                <p class="alert alert-secondary">Enter valid data please .</p>

            </div>
        </div>
    </div>
@endsection
