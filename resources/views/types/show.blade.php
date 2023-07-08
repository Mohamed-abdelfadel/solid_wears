@extends('layout')
@section('page-title')
    types profile
@endsection

@section('content')
    @include('products-navbar')

    <div class=" mt-3 mx-5">
        <h1 class="fs-4"> ( {{$type->name}} ) has {{$products->total()}} Products </h1>
        <hr>

        <table class="table table-hover table-sm table-light  shadow  ">
            <thead class="table-primary ">
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
                        <td class="table-success">{{$product->type->name}}</td>
                        <td>{{$product->size->name}}</td>
                        <td>{{$product->color->name}}<div class="color" style="background-color:{{$product->color->hex}};"></div></td>
                        <td>{{$product->brand->name}}</td>
                        <td>{{$product->stock}}</td>

                        <td>
                            <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Show</a>
                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-secondary">Edit</a>
                            <form action="{{route('products.delete', $product->id)}}"  method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger col-12">Delete</button>
                            </form>
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


        <a href="{{route('types.list')}}" class="btn btn-primary">types list</a>
        <a href="{{route('dashboard')}}" class="btn btn-outline-success  m-2">go to dashboard</a>
    </div>
@endsection
