
@extends('layout')
@section('title')
    Dashboard
@endsection

@section('content')



{{--    <x-app-layout>--}}
{{--        <x-slot name="header">--}}
{{--            <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--                {{ __('Dashboard') }}--}}
{{--            </h2>--}}
{{--        </x-slot>--}}

{{--        <div class="py-12">--}}
{{--            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                    <div class="p-6 bg-white border-b border-gray-200 row d-flex justify-content-center ">--}}


{{--                        <a href="{{route('customers.list')}}" class="btn btn-primary col-3 m-2">Customers</a>--}}
{{--                        <a href="{{route('cities.list')}}" class="btn btn-primary col-3 m-2">cities</a>--}}
{{--                        <a href="{{route('employees.list')}}" class="btn btn-primary col-3 m-2">employees</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </x-app-layout>--}}
{{--    <div class="row">--}}
{{--        <div class="sidebar ">--}}
{{--            <div class="logo">--}}
{{--                 <img src="{{asset('imgs/logo.ng')}}" alt="">--}}
{{--                <h1>Solid Wears</h1>--}}
{{--            </div>--}}
{{--            <div class="navitems ">--}}
{{--                <a type="submit" class="active">--}}
{{--                    <i class="fa-solid fa-signal"></i>--}}
{{--                    <span> Dashboard</span>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="navitems">--}}
{{--                <a href="#" class="btn">--}}
{{--                    <i class="fa-solid fa-dollar-sign"></i>--}}
{{--                    <span> Sales</span>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="navitems">--}}
{{--                <a href="#" class="btn">--}}
{{--                    <i class="fa-solid fa-receipt"></i>--}}
{{--                    <span> Vouchers</span>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="navitems">--}}
{{--                <a href="#" class="btn">--}}
{{--                    <i class="fa-solid fa-shirt"></i>--}}
{{--                    <span> Stocks</span>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="navitems">--}}
{{--                <a href="#" class="btn">--}}
{{--                    <i class="fa-solid fa-user"></i>--}}
{{--                    <span> Clients</span>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="navitems logout">--}}
{{--                <a href="{{route('logout')}}" class="btn">--}}
{{--                    <i class="fa-solid fa-power-off"></i>--}}
{{--                    <span>Logout</span>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="col-9 main">--}}
{{--            <div class="header d-flex justify-content-center">--}}
{{--                <form action="#" class=" d-flex" method="get">--}}
{{--                    <input type="text" class="" placeholder="Search">--}}
{{--                    <button type="submit" class="">Search</button>--}}
{{--                </form>--}}
{{--                <div class="dropdown profile">--}}
{{--                    <button class="btn btn-light  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        Profile--}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="m-4">--}}
{{--                <h1 class="fs-1 ">Dashboard</h1>--}}
{{--            </div>--}}
{{--            <div class="col-3 m-4">--}}
{{--                <div class="dropdown">--}}
{{--                    <button class="btn btn-light  dropdown-toggle col-6" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        Time--}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="#">Today</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Last week</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Last month</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row m-4 d-flex justify-content-between">--}}
{{--                <div class="col-9">--}}
{{--                    <div class="row">--}}
{{--                        <a class="card btn btn-outline-primary" href="{{route('customers.list')}}">--}}
{{--                            <h1 class="fs-2">{{$customers->count()}}</h1>--}}
{{--                            <p class="fs-5">Number of clients</p>--}}
{{--                        </a>--}}


{{--                        <a class="card btn btn-outline-success" href="#">--}}
{{--                            <h1 class="fs-2">50</h1>--}}
{{--                            <p class="fs-5">Number of products</p>--}}
{{--                        </a>--}}

{{--                        <a class="card btn btn-outline-success" href="#">--}}
{{--                            <h1 class="fs-2">350 $</h1>--}}
{{--                            <p class="fs-5">Margin</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-4 d-flex justify-content-between">--}}
{{--                        <a class=" card card-full col-9 btn " href="#">--}}
{{--                            <h1 class="fs-2">Popular products</h1>--}}
{{--                            <table class="table">--}}
{{--                                <thead class="table-primary">--}}
{{--                                <th style="width: 10%">ID</th>--}}
{{--                                <th style="width: 10%">Name</th>--}}
{{--                                <th style="width: 10%">Amout</th>--}}
{{--                                <th style="width: 80%">More</th>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>23948</td>--}}
{{--                                    <td>dress</td>--}}
{{--                                    <td>45</td>--}}
{{--                                    <td>nothing to see here</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-3">--}}
{{--                    <a class="card card2 btn btn-outline-secondary" href="#">--}}
{{--                        <h1 class="fs-2">3506 $</h1>--}}
{{--                        <p class="fs-5">stock value</p>--}}
{{--                        <h1 class="text-dark fs-6 my-4">Categories:</h1>--}}
{{--                        <div class="d-flex justify-content-between"><span>Coats</span><span>646 $</span></div>--}}
{{--                        <hr>--}}
{{--                        <div class="d-flex justify-content-between"><span>T-shirts</span><span>274 $</span></div>--}}
{{--                        <hr>--}}
{{--                        <div class="d-flex justify-content-between"><span>Bants</span><span>134 $</span></div>--}}
{{--                        <hr>--}}
{{--                        <div class="d-flex justify-content-between"><span>Shoes</span><span>750 $</span></div>--}}
{{--                        <h1 class="text-dark fs-6 my-4">Distribution:</h1>--}}
{{--                        <div class="d-flex justify-content-between fs-1">--}}
{{--                            <div class="btn  col-3 fs-6 "> <i class="fa-solid fa-mars"></i> 30$ </div>--}}
{{--                            <div class="btn  col-3 fs-6 "> <i class="fa-solid fa-venus"></i> 40% </div>--}}
{{--                            <div class="btn  col-3 fs-6 " > <i class="fa-solid fa-child-reaching"></i> <span> 30% </span></div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
@endsection

{{-- --}}
