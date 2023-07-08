@extends('layout')
@section('title')
    Product List
@endsection

@section('content')
    @include('products-navbar')

    <div class="mx-5 ">
    <h1 class="fs-2 mt-4"> Product Profile</h1>
    <hr>
        <div class="row">
    <div class="col-lg-6 col-md-9 ">
        <div class="section mb-3 ">
            <div class="section-body">

                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Description:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {{$product->description}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Price:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {{$product->price . ' '}}$
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Cost:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {{$product->cost . ' '}}$
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Gender:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {{$product->gender->name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Size:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {{$product->size->name}}
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Brand:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {{$product->brand->name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Type:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {{$product->type->name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Color:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        <span style=" width:100px; height: 30px; border-radius: 8px; display:inline-block; background-color: {{$product->color->hex}} ;"></span>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

            <div class="col-lg-6 col-md-9 ">
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Image:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        <img style="height: 340px;" src="{{ asset('storage/products/' . "$product->image")}}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="fs-5">Barcode:</h6>
                    </div>
                    <div class="col-sm-9 fs-6 text-secondary">
                        {!! DNS1D::getBarcodeSVG("00986514$product->id", 'EAN13',4,44) !!}
                    </div>
                </div>
                <hr>
            </div>
            <div>
            <a href="{{route('products.list')}}" class="btn btn-primary px-4">Products list</a>
            <a href="{{route('dashboard')}}" class="btn btn-outline-secondary px-4">go to Dashboard</a>
            </div>
    </div>
</div>
@endsection
