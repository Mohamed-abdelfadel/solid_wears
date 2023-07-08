@extends('layout')
@section('title')
    New brand
@endsection

@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <div class="col-6">
                <h1 class="fs-2 mt-4">New brand</h1>
                <hr>
                <div class="row">
                <form class=" col-6" action="{{route('brands.store')}}" method="post">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" @error('name') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="name" id="name" placeholder="name" value="{{ old('name') }}"  >
                        <label for="name" class="mx-3">brand name:</label>
                        @error('name')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                    <button type="submit"class="btn btn-success px-4" name="button">Create</button>
                    <a href="{{route('brands.list')}}" class="btn btn-outline-primary px-4">brands list</a>
                </form>
                <div class="col-6 alert alert-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                </div>
            </div>



            <div class="col-6">
                <h1 class="fs-2 mt-4">brands list</h1>
                <hr>
                <table class="table table-hover table-sm ">
                    <thead class="table-primary">
                    <th style="  width: 5%;">ID:</th>
                    <th style="  width: 10%;">Name:</th>
                    {{--                <th style="  width: 5%;">brand:</th>--}}

                    {{-- <th>Created</th>
                    <th>updated</th> --}}
                    <th  style="  width: 20%;" align="center">actions</th>
                    </thead>
                    <tbody>
                    @if ($brands->isNotEmpty())

                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                {{--                  <td></td>--}}
                                <td>
                                    <a href="{{route('brands.show' , $brand->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('brands.edit' , $brand->id)}}" class="btn btn-secondary">Edit</a>
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
                    {{ $brands->links()}}
                </div>
            </div>
        </div>

        </div>

    </div>
@endsection
