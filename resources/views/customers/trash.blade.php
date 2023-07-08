@extends('layout')
@section('title')
    Customers Trash
@endsection

@section('content')
    @include('stuff-navbar')

    <div class="mx-5">
    <div class="row">
        <h1 class="fs-2 mt-4 text-danger">Customers Trash</h1>
        <hr>
        @if (Session::has('success'))
        <div class="alert alert-success">
        <p class="fs-5">{{ Session::get('success') }}</p>
        </div>
        @endif
        <table class="table table-hover table-sm align-middle table-light ">
            <thead class="table-danger">
            <th style="  width: 5%;" class="fw-bolder" >#</th>
            <th style="  width: 10%;" class="fw-bold" >Name:</th>
            <th style="  width: 10%;" class="fw-bold" >Phone:</th>
            <th style="  width: 20%;" class="fw-bold" >Email:</th>
            <th style="  width: 25%;" class="fw-bold" >Address:</th>
            <th style="  width: 10%;" class="fw-bold" >City:</th>
            <th  style="  width: 20%;" align="center">actions</th>
            </thead>
            <tbody>
              @if ($customers->isNotEmpty())

              @foreach($customers as $customer)
              <tr valign='middle' class="fw-bold">
                  <td>{{$customer->id}}</td>
                  <td>{{$customer->name}}</td>
                  <td>{{$customer->phone}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->address}}</td>
                  <td>{{$customer->city->name}}</td>
                  <td>
                    <a class="btn btn-success" href="{{ route('customers.restore', $customer->id) }}">Restore</a>
                    <a class="btn btn-danger" href="{{ route('customers.fdelete',  $customer->id) }}">Delete Forever</a>
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
            <a href="{{route('customers.list')}}" class="btn btn-outline-primary col-2 m-2">Go to customers list</a>
        </div>

    </div>

</div>

@endsection
