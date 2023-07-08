<nav class="sidebar close">
    <header>
        <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

            <div class="text logo-text">
                <span class="name title mt-5 pt-3 fs-5">Solid Wears</span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

{{--            <li class="search-box">--}}
{{--                <i class='bx bx-search icon'></i>--}}
{{--                <input type="text" placeholder="Search...">--}}
{{--            </li>--}}

            <ul class="menu-links">

                <li class="nav-link">
                    <a href="{{route('dashboard')}}">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{route('customers.list')}}">
                        <i class='bx bx-user icon' ></i>
                        <span class="text nav-text">Stuff</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{route('products.list')}}">
                        <i class='bx bx-shopping-bag icon' ></i>
                        <span class="text nav-text">Products</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-task icon'></i>
                        <span class="text nav-text">Invoices</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-pie-chart-alt icon' ></i>
                        <span class="text nav-text">Analytics</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-heart icon' ></i>
                        <span class="text nav-text">Likes</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-wallet icon' ></i>
                        <span class="text nav-text">Wallets</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="{{route('logout')}}">
                    <i class='bx bx-log-out icon' ></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>



        </div>
    </div>

</nav>
