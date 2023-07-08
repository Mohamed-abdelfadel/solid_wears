@extends('layout')
@section('title')
    New size
@endsection

@section('content')
    @include('products-navbar')

    <div class="mx-5">
        <div class="row">
            <div class="col-6">
                <h1 class="fs-2 mt-4">New size</h1>
                <hr>
                <div class="row">
                <form class=" col-6" action="{{route('sizes.store')}}" method="post">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" @error('name') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="name" id="name" placeholder="name" value="{{ old('name') }}"  >
                        <label for="name" class="mx-3">size name:</label>
                        @error('name')
                        <p class="invalid-feedback fs-6"> {{ $message }} </p>
                        @enderror
                    </div>
                    <button type="submit"class="btn btn-success px-4" name="button">Create</button>
                    <a href="{{route('sizes.list')}}" class="btn btn-outline-primary px-4">sizes list</a>
                </form>
                <div class="col-6 alert alert-secondary">Please enter valid data</div>
                </div>
            </div>



            <div class="col-6">
                <h1 class="fs-2 mt-4">sizes list</h1>
                <hr>
                <table class="table table-hover table-sm ">
                    <thead class="table-primary">
                    <th style="  width: 5%;">ID:</th>
                    <th style="  width: 10%;">Name:</th>
                    {{--                <th style="  width: 5%;">size:</th>--}}

                    {{-- <th>Created</th>
                    <th>updated</th> --}}
                    <th  style="  width: 20%;" align="center">actions</th>
                    </thead>
                    <tbody>
                    @if ($sizes->isNotEmpty())

                        @foreach($sizes as $size)
                            <tr>
                                <td>{{$size->id}}</td>
                                <td>{{$size->name}}</td>
                                {{--                  <td></td>--}}
                                <td>
                                    <a href="{{route('sizes.show' , $size->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('sizes.edit' , $size->id)}}" class="btn btn-secondary">Edit</a>
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
                    {{ $sizes->links()}}
                </div>
            </div>
        </div>

        </div>

    </div>
@endsection
