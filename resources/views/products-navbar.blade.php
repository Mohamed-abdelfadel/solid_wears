<nav class="navbar navbar-expand-lg bg-light ">
    <div class="container-fluid">
        <a class="navbar-brand text-dark title" href="{{route('dashboard')}} ">Solid wears</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}} ">Dashboard</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('products.list')}}">Products list</a></li>
                        <li><a class="dropdown-item" href="{{route('products.create')}}">Add new product</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('products.trash')}}">Deleted products</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Genders
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('genders.list')}}">Genders list</a></li>
                        <li><a class="dropdown-item" href="{{route('genders.create')}}">Add new gender</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('genders.trash')}}">Deleted genders</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sizes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('sizes.list')}}">Sizes list</a></li>
                        <li><a class="dropdown-item" href="{{route('sizes.create')}}">Add new size</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('sizes.trash')}}">Deleted sizes</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Brands
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('brands.list')}}">Brands list</a></li>
                        <li><a class="dropdown-item" href="{{route('brands.create')}}">Add new brand</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('brands.trash')}}">Deleted brands</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Types
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('types.list')}}">Types list</a></li>
                        <li><a class="dropdown-item" href="{{route('types.create')}}">Add new type</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('types.trash')}}">Deleted types</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Colors
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('colors.list')}}">Colors list</a></li>
                        <li><a class="dropdown-item" href="{{route('colors.create')}}">Add new color</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('colors.trash')}}">Deleted colors</a></li>
                    </ul>
                </li>

            </ul>

            @if(Route::is('genders.*'))
                <form class="d-flex" role="search" method="get" action="{{route('genders.list')}}">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif

            @if(Route::is('sizes.*'))
                <form class="d-flex" role="search" method="get" action="{{route('sizes.list')}}">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif

            @if(Route::is('brands.*'))
                <form class="d-flex" role="search" method="get" action="{{route('brands.list')}}">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif

            @if(Route::is('types.*'))
                <form class="d-flex" role="search" method="get" action="{{route('types.list')}}">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif

            @if(Route::is('colors.*'))
                <form class="d-flex" role="search" method="get" action="{{route('colors.list')}}">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif

            @if(Route::is('products.*'))
                <form class="d-flex" role="search" method="get" action="{{route('products.list')}}">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif


        </div>
    </div>
</nav>
