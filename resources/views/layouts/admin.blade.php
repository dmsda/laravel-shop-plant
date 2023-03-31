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
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />
     @stack('addon-style')
 </head>

 <body>
     <!-- NAVBAR -->
     <div class="page-dashboard">
         <div class="d-flex" id="wrapper" data-aos="fade-right">
             <!-- Side Navbar -->
             <div class="border-right" id="sidebar-wrapper">
                 <div class="sidebar-heading text-center">
                     <img src="/images/admin.png" alt="" class="my-4" style="max-width: 100px" />
                 </div>
                 <div class="list-group list-group-flush">
                     <a href="{{ route('admin-dashboard') }}"
                         class="list-group-item list-group-item-action">Dasboard</a>
                     <a href="{{ route('product.index') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}">Products</a>
                     <a href="{{ route('product-gallery.index') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}">Gallery</a>
                     <a href="{{ route('transaction.index') }}"
                         class="list-group-item list-group-item-action">Transactions</a>
                     <a href="{{ route('user.index') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }}">Users</a>
                     <a href="{{ route('category.index') }}"
                         class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}">Categories</a>
                     <a href="/index.html" class="list-group-item list-group-item-action">Log Out</a>
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
                                         Hi, Dimas
                                     </a>
                                     <div class="dropdown-menu">
                                         <a href="/" class="dropdown-item">Logout</a>
                                     </div>
                                 </li>

                             </ul>
                             <!-- Desktop Menu -->
                             <!-- Mobile Menu -->
                             <ul class="navbar-nav d-block d-lg-none">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link"> Hi, Dimas </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{ route('home') }}" class="nav-link"> Logout</a>
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
     <script src="/vendor/jquery/jquery.min.js"></script>
     <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.js"></script>
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