@extends('layout')
@section('page-title')
    Vendors profile
@endsection

@section('content')
    @include('stuff-navbar')

    <div class="mx-5 ">
  <h1 class="fs-2"> Vendors profile</h1>
  <hr>
          <div class="col-6 ">
            <div class="section mb-3 ">
              <div class="section-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Full Name</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$vendor->name}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Email</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$vendor->email}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Phone</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$vendor->phone}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="fs-5">Address</h6>
                  </div>
                  <div class="col-sm-9 fs-6 text-secondary">
                    {{$vendor->address}}
                  </div>
                </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="fs-5">First seen</h6>
                      </div>
                      <div class="col-sm-9 fs-6 text-secondary">
                          {{$vendor->created_at}}
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <h6 class="fs-5">Last seen</h6>
                      </div>
                      <div class="col-sm-9 fs-6 text-secondary">
                          {{$vendor->updated_at}}
                      </div>
                  </div>
                <hr>
                <a href="{{route('vendors.list')}}" class="btn btn-primary">vendors list</a>
                <a href="{{route('dashboard')}}" class="btn btn-outline-secondary col-3 m-2">go to Dashboard</a>
  </div>
@endsection
