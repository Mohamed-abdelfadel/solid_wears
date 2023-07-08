@extends('layout')
@section('page-title')
    cities profile
@endsection

@section('content')
    @include('stuff-navbar')

    <div class=" mt-3 mx-5">
        <div class="row">
            <div class="col-4">
        <h1 class="fs-4"> ( {{$city->name}} ) has {{$customers->total()}} Customers </h1>
        <hr>
                <div class="row">
                    <table class="table table-hover table-sm ">
                        <thead class="table-primary">
                        <th style="  width: 10%;">ID:</th>
                        <th style="  width: 40%;">Name:</th>
                        <th style="  width: 40%;">Phone:</th>
                        <th  style="  width: 10%;" align="center">actions</th>
                        </thead>
                        <tbody>
                        @if ($customers->isNotEmpty())

                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>
                                        <a href="{{route('customers.show' , $customer->id )}}" class="btn btn-primary">Show</a>
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
                        {{ $customers->links()}}
                    </div>

                </div>
            </div>
            <div class="col-4">
                <h1 class="fs-4"> ( {{$city->name}} ) has {{$employees->total()}} Employees </h1>
                <hr>
                <table class="table table-hover table-sm ">
                    <thead class="table-primary">
                    <th style="  width: 10%;">ID:</th>
                    <th style="  width: 40%;">Name:</th>
                    <th style="  width: 40%;">Phone:</th>


                    {{-- <th>Created</th>
                    <th>updated</th> --}}
                    <th  style="  width: 10%;" align="center">actions</th>
                    </thead>
                    <tbody>
                    @if ($employees->isNotEmpty())

                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    <a href="{{route('employees.show' , $employee->id )}}" class="btn btn-primary">Show</a>
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
                    {{ $employees->links()}}
                </div>
            </div>
            <div class="col-4">
                <h1 class="fs-4"> ( {{$city->name}} ) has {{$vendors->total()}} Vendors </h1>
                <hr>
                <div class="row">
                    <table class="table table-hover table-sm ">
                        <thead class="table-primary">
                        <th style="  width: 10%;">ID:</th>
                        <th style="  width: 40%;">Name:</th>
                        <th style="  width: 40%;">Phone:</th>
                        <th  style="  width: 10%;" align="center">actions</th>
                        </thead>
                        <tbody>
                        @if ($vendors->isNotEmpty())

                            @foreach($vendors as $vendor)
                                <tr>
                                    <td>{{$vendor->id}}</td>
                                    <td>{{$vendor->name}}</td>
                                    <td>{{$vendor->phone}}</td>
                                    <td>
                                        <a href="{{route('vendors.show' , $vendor->id )}}" class="btn btn-primary">Show</a>
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
                        {{ $vendors->links()}}
                    </div>

                </div>
            </div>
    </div>
        <a href="{{route('cities.list')}}" class="btn btn-primary">Cities list</a>
        <a href="{{route('dashboard')}}" class="btn btn-outline-success  m-2">go to dashboard</a>
    </div>
@endsection
