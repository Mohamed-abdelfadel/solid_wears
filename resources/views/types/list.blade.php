@extends('layout')
@section('title')
    types List
@endsection
@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <h1 class="fs-2 mt-4">types List ⇒ {{$types->total()}}</h1>
            <hr>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p class="fs-5">{{ Session::get('success') }}</p>
                </div>
            @endif
            <table class="table table-hover table-sm ">
                <thead class="table-primary">
                <th style="  width: 5%;" class="fw-bold">ID:</th>
                <th style="  width: 10%;" class="fw-bold">Name:</th>
                <th style="  width: 5%;" class="fw-bold">No of products:</th>

                <th  style="  width: 20%;" align="center">Actions</th>
                </thead>
                <tbody>
                @if ($types->isNotEmpty())

                    @foreach($types as $type)
                        <tr valign='middle'>
                            <td class="fw-bold">{{$type->id}}</td>
                            <td>{{$type->name}}</td>
                            <td>{{$type->products->count()}}</td>

                            <td>
                                <a href="{{route('types.show' , $type->id)}}" class="btn btn-primary">Show</a>
                                <a href="{{route('types.edit' , $type->id)}}" class="btn btn-secondary">Edit</a>
                                <form action="{{route('types.destroy' , $type->id)}}"  method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger col-12">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="table-danger" align="center">
                        <td colspan="7"  class="fs-2 "> Data Not Found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class=" fs-6">
                {{ $types->links()}}
            </div>
            <div class="row">
                <a href="{{route('welcome')}}" class="btn btn-outline-primary col-2 m-2">Go to main page</a>
            </div>
            <div class="row">
                <a href="{{route('types.create')}}" class="btn btn-outline-success col-2 m-2">Add new type</a>
            </div>
        </div>

    </div>


@endsection
