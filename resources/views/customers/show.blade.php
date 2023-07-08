@extends('layout')
@section('page-title')
  Customers profile
@endsection

@section('content')
    @include('stuff-navbar')

    <div class="mx-5 ">
  <h1 class="fs-2"> Customer Profile</h1>
  <hr>
          <div class="col-6 ">
            <div class="section mb-3 ">
              <div class="section-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Full Name</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$customer->name}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Email</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$customer->email}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Phone</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$customer->phone}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Address</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$customer->address}}
                  </div>
                </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="fs-5">City</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                      {{$customer->city->name}}
                    </div>
                  </div>
                    <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="fs-5">First seen</h6>
                      </div>
                      <div class="col-sm-9 fs-6 text-secondary">
                          {{$customer->created_at}}
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="fs-5">Last seen</h6>
                      </div>
                      <div class="col-sm-9 fs-6 text-secondary">
                          {{$customer->updated_at}}
                      </div>
                  </div>
                <hr>
                <a href="{{route('customers.list')}}" class="btn btn-primary">Customers list</a>
                <a href="{{route('dashboard')}}" class="btn btn-outline-secondary col-3 m-2">go to Dashboard</a>
  </div>
@endsection
