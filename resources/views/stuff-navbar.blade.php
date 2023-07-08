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
                  Cities
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('cities.list')}}">Cities list</a></li>
                  <li><a class="dropdown-item" href={{route('cities.create')}}>Add new city</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('cities.trash')}}">Deleted cities</a></li>
              </ul>
          </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Customers
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('customers.list')}}">Customers list</a></li>
            <li><a class="dropdown-item" href="{{route('customers.create')}}">Add new customer</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('customers.trash')}}">Deleted customers</a></li>
          </ul>
        </li>






          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Employees
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('employees.list')}}">Employees list</a></li>
                  <li><a class="dropdown-item" href="{{route('employees.create')}}">Add new employee</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('employees.trash')}}">Deleted employees </a> </li>
{{--                  <i class='bx bx-trash  icon' ></i>--}}
              </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Vendors
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('vendors.list')}}">Vendors list</a></li>
                  <li><a class="dropdown-item" href="{{route('vendors.create')}}">Add new vendor</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('vendors.trash')}}">Deleted Vendors</a></li>
              </ul>
          </li>

        </ul>
        @if(Route::is('customers.*'))
            <form class="d-flex" role="search" method="get" action="{{route('customers.list')}}">
                @csrf
                <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search" autofocus>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        @endif
        @if(Route::is('cities.*'))
            <form class="d-flex" role="search" method="get" action="{{route('cities.list')}}">
                @csrf
                <select class="rounded-start border-success dropdown-toggle-split">
                    <option value="all">All</option>
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                </select>
                <input class="form-control mx-2 " type="search" name="search" placeholder="search" aria-label="Search" autofocus>

                <button class="btn btn-outline-success" type="submit" hidden>Search</button>
            </form>
        @endif
        @if(Route::is('employees.*'))
            <form class="d-flex" role="search" method="get" action="{{route('employees.list')}}">
                @csrf
                <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search" autofocus>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        @endif
        @if(Route::is('vendors.*'))
            <form class="d-flex" role="search" method="get" action="{{route('vendors.list')}}">
                @csrf
                <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search" autofocus>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        @endif

    </div>
  </div>
</nav>
