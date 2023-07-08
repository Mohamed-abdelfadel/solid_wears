@extends('layout')
@section('title')
    Products Cart
@endsection

@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <h1 class="fs-2 mt-4">Products Cart ⇒ {{$products->total()}}</h1>
            <hr>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p class="fs-5">{{ Session::get('success') }}</p>
                </div>
            @endif
            <table class="table table-hover table-sm table-light  shadow  ">
                <thead class="table-primary ">
                <th style="  width: 1%;" class="fw-bolder" >ID</th>
                <th style="  width: 7%; , height: 7%;" class="fw-bold" >Image:</th>
                <th style="  width: 25%;" class="fw-bold" >Description:</th>
                <th style="  width: 5%;" class="fw-bold" >Price:</th>
                <th style="  width: 3%;" class="fw-bold" >Available:</th>
                <th  style="  width: 15%;" class="fw-bold">Actions</th>
                </thead>
                <tbody>
                @if ($products->isNotEmpty())

                    @foreach($products as $product)
                        <tr valign='middle' >
                            <td >{{$product->id}}</td>
                            <td><img  style="height: 50px;  width: 60px;" src="{{ asset('storage/products/' . "$product->image")}}"></td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price . ' '}}$</td>
                            <td>{{$product->stock}}</td>

                            <td>
                                <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Show</a>
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-secondary">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="table-danger" align="center" >
                        <td colspan="13"  class="fs-2"  > Data Not Found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class=" fs-6">
                {{ $products->links()}}
            </div>
            <div class="row">
                <a href="{{route('products.list')}}" class=" btn btn-outline-success col-2 m-2">Products List</a>
            </div>

        </div>

    </div>

@endsection
