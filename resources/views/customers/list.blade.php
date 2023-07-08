@extends('layout')
@section('title')
    Customers List
@endsection

@section('content')
    @include('stuff-navbar')

<div class="mx-5">
    <div class="row">
        <h1 class="fs-2 mt-4">Customers List ⇒ {{$customers->total()}}</h1>
        <hr>
        @if (Session::has('success'))
        <div class="alert alert-success">
        <p class="fs-5">{{ Session::get('success') }}</p>
        </div>
        @endif
        <table class="table table-hover table-sm table-light  shadow  ">
            <thead class="table-primary ">
                <th style="  width: 5%;" class="fw-bolder" >#</th>
                <th style="  width: 10%;" class="fw-bold" >Name:</th>
                <th style="  width: 10%;" class="fw-bold" >Phone:</th>
                <th style="  width: 20%;" class="fw-bold" >Email:</th>
                <th style="  width: 25%;" class="fw-bold" >Address:</th>
                <th style="  width: 10%;" class="fw-bold" >City:</th>
                <th  style="  width: 20%;" align="center">Actions</th>
            </thead>
            <tbody>
              @if ($customers->isNotEmpty())

              @foreach($customers as $customer)
              <tr valign='middle'>
                  <td class="fw-bold"   >{{$customer->id}}</td>
                  <td>{{$customer->name}}</td>
                  <td>{{$customer->phone}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->address}}</td>
                  <td>{{$customer->city->name }}</td>

                  <td>
                      <a href="{{route('customers.show' , $customer->id )}}" class="btn btn-primary">Show</a>
                      <a href="{{route('customers.edit' , $customer->id )}}" class="btn btn-secondary">Edit</a>
                      <form action="{{route('customers.destroy' , $customer->id  )}}"  method="post" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger col-12">Delete</button>
                        </form>
                  </td>
              </tr>
              @endforeach
            @else
                <tr class="table-danger" align="center" >
                    <td colspan="7"  class="fs-2"  > Data Not Found</td>
                </tr>
              @endif
            </tbody>
        </table>
        <div class=" fs-6">
             {{ $customers->links()}}
        </div>
        <div class="row">
        <a href="{{route('customers.create')}}" class="btn btn-outline-success col-2 m-2">Add new customer</a>
        </div>
        <div class="row">
        <a href="{{route('dashboard')}}" class="btn btn-outline-secondary col-2 m-2">Go to dashboard</a>
        </div>

    </div>

</div>

@endsection
