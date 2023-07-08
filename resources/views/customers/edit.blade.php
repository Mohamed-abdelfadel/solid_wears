@extends('layout')
@section('page-title')
Edit customer
@endsection

@section('content')
    @include('stuff-navbar')

    <div class="mx-5">
    <div class="row">
        <h1 class="fs-2 mt-4">Customers edit</h1>
        <hr>
        <form class="col-6" action="{{route('customers.update' ,  $customer->id )}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="form-floating mb-4 col-6">
          <input type="text" class="form-control   @error('name') is-invalid @enderror " name="name" id='name' placeholder="name" value="{{ old('name',$customer->name) }}">
            <label for="name" class="mx-3">Customer name:</label>

            @error('name')
          <p class="invalid-feedback fs-6"> {{ $message }} </p>
          @enderror
        </div>
        <div class="form-floating mb-4 col-6">
          <input type="text" class="form-control   @error('phone') is-invalid @enderror " name="phone" id='phone' value="{{ old('phone',$customer->phone) }}">
            <label for="phone" class="mx-3">Customer phone:</label>

            @error('phone')
          <p class="invalid-feedback fs-6"> {{ $message }} </p>
          @enderror
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control   @error('email') is-invalid @enderror " name="email" id='email' value="{{ old('email',$customer->email) }}">
        <label for="email" class="">Customer email:</label>

        @error('email')
      <p class="invalid-feedback fs-6"> {{ $message }} </p>
      @enderror
    </div>

    <div class="form-floating mb-4">
    <input  class="form-control   @error('address') is-invalid @enderror " name="address" id='address' value="{{ old('address',$customer->address) }}">
    <label for="address" class="mx-3">Customer address:</label>
    @error('address')
    <p class="invalid-feedback fs-6"> {{ $message }} </p>
    @enderror
     </div>
            <div class="form-floating mb-4">
                <select  class=" form-select @error('city') is-invalid @enderror"  name="city" id="city">
                    <option value="0">--SELECT--</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}" @if($customer->city->id == $city->id){{'SELECTED'}}@endif >{{ $city->name }}</option>
                    @endforeach
                </select>
                <label for="city" class="mx-3">Customer city:</label>
                @error('city')
                <p class="invalid-feedback fs-6"> {{ $message }} </p>
                @enderror
            </div>
    <button type="submit" class="btn btn-success col-3" name="button">Update</button>
    <a href="{{route('customers.list')}}" class="btn btn-outline-primary col-3">Customers list</a>
        </form>
    </div>
</div>
@endsection
