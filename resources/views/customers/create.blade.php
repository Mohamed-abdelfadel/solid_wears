@extends('layout')
@section('title')
New customer
@endsection

@section('content')
    @include('stuff-navbar')

    <div class="mx-5">
    <div class="row">
        <h1 class="fs-2 mt-4">New customer</h1>
        <hr>
        <form class="col-6"  action="{{route('customers.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="form-floating mb-4 col-6">
          <input type="text" @error('name') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="name" id="name" placeholder="name" value="{{ old('name') }}" required >
            <label for="name" class="mx-3">Customer name:</label>

            @error('name')
          <p class="invalid-feedback fs-6"> {{ $message }} </p>
          @enderror
        </div>
        <div class="form-floating  mb-4  col-6">
          <input type="text"   @error('phone') class=" form-control is-invalid" autofocus  @enderror class="form-control"  name="phone" id="phone" placeholder="phone" value="{{ old('phone') }}" required >
            <label for="phone" class="mx-3">Customer phone:</label>

            @error('phone')
          <p class="invalid-feedback fs-6"> {{ $message }} </p>
          @enderror
        </div>
    </div>
            <div class="form-floating mb-4 ">
                <input type="text" @error('email') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="email" id="email" placeholder="email" value="{{ old('email') }}" required>
                <label for="email" class="mx-3">Customer email:</label>

                @error('email')
                <p class="invalid-feedback fs-6"> {{ $message }} </p>
                @enderror
            </div>
            <div class="form-floating mb-4 ">
                <input type="text" @error('address') class=" form-control is-invalid" autofocus  @enderror class="form-control" name="address" id="address" placeholder="address" value="{{ old('address') }}" >
                <label for="address" class="mx-3">Customer address:</label>

                @error('address')
                <p class="invalid-feedback fs-6"> {{ $message }} </p>
                @enderror
            </div>

            <div class="form-floating mb-4">
                <select  class=" form-select @error('city') is-invalid @enderror"  name="city" id="city">
                    <option value="0">--SELECT--</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}"@selected(old('city') == $city->id)>{{ $city->name }}</option>
                    @endforeach
                </select>
                <label for="city">City:</label>
                @error('city')
                <p class="invalid-feedback fs-6"> {{ $message }} </p>
                @enderror
            </div>
    <button type="submit"class="btn btn-success col-3" name="button">Create</button>
    <a href="{{route('customers.list')}}" class="btn btn-outline-primary col-3">Customers list</a>
  </form>
        <div class=" col-6">
            <p class="alert alert-secondary">Enter valid data please .</p>

        </div>
    </div>

</div>
@endsection
