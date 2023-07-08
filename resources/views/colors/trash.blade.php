@extends('layout')
@section('title')
    colors trash
@endsection
@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <h1 class="fs-2 mt-4 text-danger">colors trash ⇒ {{$colors->total()}}</h1>
            <hr>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p class="fs-5">{{ Session::get('success') }}</p>
                </div>
            @endif
            <table class="table table-hover table-sm ">
                <thead class="table-danger">
                <th style="  width: 5%;" class="fw-bold">ID:</th>
                <th style="  width: 10%;" class="fw-bold">Name:</th>
                <th  style="  width: 20%;" class="fw-bold">Actions</th>
                </thead>
                <tbody>
                @if ($colors->isNotEmpty())

                    @foreach($colors as $color)
                        <tr valign='middle'>
                            <td class="fw-bold">{{$color->id}}</td>
                            <td>{{$color->name}}</td>

                            <td>
                                <a href="{{route('colors.restore' , $color->id)}}" class="btn btn-success">Restore</a>
                                <a href="{{route('colors.fdelete' , $color->id)}}" class="btn btn-danger">Delete forever</a>

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
                {{ $colors->links()}}
            </div>
            <div class="row">
                <a href="{{route('colors.list')}}" class="btn btn-outline-primary col-2 m-2">Go to colors list</a>
            </div>

        </div>

    </div>


@endsection
