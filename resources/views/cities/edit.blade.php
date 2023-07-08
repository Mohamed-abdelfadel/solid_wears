@extends('layout')
@section('page-title')
    Edit city
@endsection

@section('content')
    @include('stuff-navbar')

    <div class="mx-5">
        <div class="row">
            <div class="col-6">
                <h1 class="fs-2 mt-4">New city</h1>
                <hr>
                <div class="row">
                <form class="col-6" action="{{route('cities.update' ,  $city->id )}}" method="post">
                    @csrf
                    @method('PUT')
                        <div class="form-floating mb-4 ">
                            <input type="text" class="form-control   @error('name') is-invalid @enderror " name="name" id='name' placeholder="name" value="{{ old('name',$city->name) }}">
                            <label for="name" class="mx-3">City name:</label>
                            @error('name')
                            <p class="invalid-feedback fs-6"> {{ $message }} </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success px-4 " name="button">Update</button>
                        <a href="{{route('cities.list')}}" class="btn btn-outline-primary px-4">Customers list</a>
                </form>
                <div class="col-6 alert alert-secondary">Please enter valid data</div>
                </div>
            </div>



            <div class="col-6">
                <h1 class="fs-2 mt-4">Cities list</h1>
                <hr>
                <table class="table table-hover table-sm ">
                    <thead class="table-primary">
                    <th style="  width: 5%;">ID:</th>
                    <th style="  width: 10%;">Name:</th>
                    {{--                <th style="  width: 5%;">City:</th>--}}

                    {{-- <th>Created</th>
                    <th>updated</th> --}}
                    <th  style="  width: 20%;" align="center">actions</th>
                    </thead>
                    <tbody>
                    @if ($cities->isNotEmpty())

                        @foreach($cities as $city)
                            <tr>
                                <td>{{$city->id}}</td>
                                <td>{{$city->name}}</td>
                                {{--                  <td></td>--}}
                                <td>
                                    <a href="{{route('cities.show' , $city->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('cities.edit' , $city->id)}}" class="btn btn-secondary">Edit</a>
                                    <form action="#"  method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger col-12">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="table-danger" align="center">
                            <td colspan="6"  class="fs-2 "> Data Not Found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class=" fs-6">
                    {{ $cities->links()}}
                </div>
            </div>
        </div>

    </div>

    </div>
@endsection

