@extends('layout')
@section('title')
    Cities trash
@endsection
@section('content')
    @include('stuff-navbar')

    <div class="mx-5">
        <div class="row">
            <h1 class="fs-2 mt-4 text-danger">Cities trash ⇒ {{$cities->total()}}</h1>
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
                <th style="  width: 5%;" class="fw-bold">No of customers:</th>
                <th style="  width: 5%;" class="fw-bold">No of employees:</th>
                <th style="  width: 5%;" class="fw-bold">No of vendors:</th>
                <th  style="  width: 20%;" align="center">Actions</th>
                </thead>
                <tbody>
                @if ($cities->isNotEmpty())

                    @foreach($cities as $city)
                        <tr valign='middle'>
                            <td class="fw-bold">{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>{{$city->customers->count()}}</td>
                            <td>{{$city->employees->count()}}</td>
                            <td>{{$city->vendors->count()}}</td>
                            <td>
                                <a href="{{route('cities.restore' , $city->id)}}" class="btn btn-success">Restore</a>
                                <a href="{{route('cities.fdelete' , $city->id)}}" class="btn btn-danger">Delete forever</a>

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
                {{ $cities->links()}}
            </div>
            <div class="row">
                <a href="{{route('cities.list')}}" class="btn btn-outline-primary col-2 m-2">Go to cities list</a>
            </div>

        </div>

    </div>


@endsection
