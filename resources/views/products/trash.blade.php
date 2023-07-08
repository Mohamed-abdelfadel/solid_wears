@extends('layout')
@section('title')
    Products trash
@endsection

@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <h1 class="fs-2 mt-4 text-danger">Products trash ⇒ {{$products->total()}}</h1>
            <hr>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p class="fs-5">{{ Session::get('success') }}</p>
                </div>
            @endif
            <table class="table table-hover table-sm table-light  shadow  ">
                <thead class="table-danger ">
                <th style="  width: 3%;" class="fw-bolder" >#</th>
                <th style="  width: 7%; , height: 7%;" class="fw-bold" >Image:</th>
                <th style="  width: 25%;" class="fw-bold" >Description:</th>
                <th style="  width: 5%;" class="fw-bold" >Price:</th>
                <th style="  width: 5%;" class="fw-bold" >Cost:</th>
                <th style="  width: 5%;" class="fw-bold" >Gender:</th>
                <th style="  width: 5%;" class="fw-bold" >Type:</th>
                <th style="  width: 5%;" class="fw-bold" >size:</th>
                <th style="  width: 10%;" class="fw-bold" >Color:</th>
                <th style="  width: 5%;" class="fw-bold" >Brand:</th>
                <th style="  width: 3%;" class="fw-bold" >Available:</th>
                <th  style="  width: 15%;" class="fw-bold">Actions</th>
                </thead>
                <tbody>
                @if ($products->isNotEmpty())

                    @foreach($products as $product)
                        <tr valign='middle' >
                            <td class="fw-bold">{{$product->id}}</td>
                            <td><img  style="height: 50px;  width: 60px;" src="{{ asset('storage/products/' . "$product->image")}}"></td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price . ' '}}$</td>
                            <td>{{$product->cost . ' '}}$</td>
                            <td>{{$product->gender->name}}</td>
                            <td>{{$product->type->name}}</td>
                            <td>{{$product->size->name}}</td>
                            <td>{{$product->color->name}}<div class="color" style="background-color:{{$product->color->hex}};"></div></td>
                            <td>{{$product->brand->name}}</td>
                            <td>{{$product->stock}}</td>

                            <td>
                                <a href="{{route('products.restore', $product->id)}}" class="btn btn-success">Restore</a>
                                <a href="{{route('products.fdelete', $product->id)}}" class="btn btn-danger">Delete forever</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="table-danger" align="center" >
                        <td colspan="12"  class="fs-2"  > Data Not Found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class=" fs-6">
                {{ $products->links()}}
            </div>
                <a href="{{route('products.list')}}" class=" btn btn-outline-primary col-2 m-2">Go to products list</a>



        </div>

    </div>

@endsection
