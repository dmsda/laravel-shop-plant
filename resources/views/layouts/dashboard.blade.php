 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <meta name="description" content="" />
     <meta name="author" content="" />

     <title>
         @yield('title')
     </title>
     @stack('prepend-style')
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
     <link href="/style/main.css" rel="stylesheet" />
     @stack('addon-style')
 </head>

 <body>
     <!-- NAVBAR -->
     <div class="page-dashboard">
         <div class="d-flex" id="wrapper" data-aos="fade-right">
             <!-- Side Navbar -->
             <div class="border-right" id="sidebar-wrapper">
                 <div class="sidebar-heading text-center">
                     <img src="/images/logo.svg" alt="" class="my-4" />
                 </div>
                 <div class="list-group list-group-flush">
                     <a href="{{ route('dashboard') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}">Dasboard</a>
                     <a href="{{ route('dashboard-products') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('dashboard/product*')) ? 'active' : '' }}">Products</a>
                     <a href="{{ route('dashboard-transactions') }}"
                         class="list-group-item list-group-item-action{{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}">Transactions</a>
                     <a href="{{ route('dashboard-setting') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('dashboard/settings*')) ? 'active' : '' }}">Setting</a>
                     <a href="{{ route('dashboard-account') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('dashboard/account*')) ? 'active' : '' }}">Account</a>
                     <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">Sign Out</a>
                 </div>
             </div>
             <!-- Navbar Icon -->
             <div id="page-content-wrapper">
                 <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                     <div class="container-fluid">
                         <a href="/dashboard.html"><img src="/images/logo.svg" alt=""
                                 class="d-md-none mr-auto mr-2 icon-side" id="menu-toggle" /></a>

                         <button class="navbar-toggler" type="button" data-toggle="collapse"
                             data-target="#sidebarResponsive">
                             <span class="navbar-toggler-icon"> </span>
                         </button>
                         <div class="collapse navbar-collapse" id="sidebarResponsive">
                             <!-- Desktop Menu -->

                             <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                 <li class="nav-item dropdown">
                                     <a href="" class="nav-link" id="navbarDropdown" role="button"
                                         data-toggle="dropdown">
                                         <img src="/images/user.png" alt=""
                                             class="rounded-circle mr-2 profile-picture" />
                                         Hi, {{ Auth::user()->name }}
                                     </a>
                                     <div class="dropdown-menu">
                                         <a href="{{ route('dashboard') }}" class="dropdown-item">Dasboard</a>
                                         <a href="{{ route('dashboard-account') }}" class="dropdown-item">Setting</a>
                                         <div class="dropdown-divider"></div>
                                         <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                                     </div>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                         @php
                                         $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                         @endphp
                                         @if ($carts > 0)
                                         <img src="/images/cart-2.svg" alt="Cart Saha Store" />
                                         <div class="card-badge">{{ $carts }}</div>
                                         @else
                                         <img src="/images/cart-2.svg" alt="Cart Saha Store" />
                                         @endif
                                     </a>
                                 </li>
                             </ul>
                             <!-- Desktop Menu -->
                             <!-- Mobile Menu -->
                             <ul class="navbar-nav d-block d-lg-none">
                                 <li class="nav-item">
                                     <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                         @php
                                         $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                         @endphp
                                         @if ($carts > 0)
                                         <img src="/images/cart-2.svg" alt="Cart Saha Store" />
                                         <div class="card-badge">{{ $carts }}</div>
                                         @else
                                         <img src="/images/cart-2.svg" alt="Cart Saha Store" />
                                         @endif
                                     </a>
                                 </li>
                             </ul>
                             <!-- Mobile Menu -->
                         </div>
                     </div>
                 </nav>
                 <!-- CONTENT -->
                 @yield('content')
                 <!-- CONTENT -->
             </div>
         </div>
     </div>
     <!-- NAVBAR -->

     <!-- Bootstrap core JavaScript -->
     @stack('prepend-script')
     <script src="/vendor/jquery/jquery.slim.min.js"></script>
     <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script>
         AOS.init();

     </script>
     <script>
         $("#menu-toggle").click(function (e) {
             e.preventDefault();
             $("#wrapper").toggleClass("toggled");
         });

     </script>
     @stack('addon-script')
 </body>

 </html>
