<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title>@yield('title')</title>


    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href=" {{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }} " rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href=" {{ asset('admin/vendor/animsition/animsition.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{  asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('admin/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="  has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('ui_admin') }}"  >
                                <i class="fa-solid fa-bars"></i>Categories
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="  has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('product_ui') }}">
                            <i class="fa-brands fa-product-hunt"></i>Products
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="  has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('ui_package') }}">
                                <i class="fa-solid fa-truck-fast"></i>Packages
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="  has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('cheflist_ui') }}">
                                <i class="fa-solid fa-kitchen-set"></i>Chefs
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="  has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('ui_gallerylist') }}">
                                <i class="fa-brands fa-envira"></i>Galleries
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="  has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('ui_orderlist_page') }}">
                                <i class="fa-solid fa-cart-shopping"></i>User Order lists
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="  has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('ui_contact_list') }}">
                                <i class="fa-regular fa-address-book"></i>Contact information
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if ( Auth::user()->img == null && Auth::user()->gender == 'Male')
                                            <img src="{{ asset('logo/boyuser.png') }}" alt="John Doe" />
                                            @elseif (Auth::user()->img == null && Auth::user()->gender == 'Female')
                                            <img src="{{  asset('logo/girl.jfif') }}" alt="">
                                            @else
                                            <img  width="400px" src="{{  asset('storage/'.Auth::user()->img) }}" alt="John Doe" />
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"> {{ Auth::user()->name }} </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if ( Auth::user()->img == null && Auth::user()->gender == 'Male')
                                                        <img src="{{ asset('logo/boyuser.png') }}" alt="John Doe" />
                                                        @elseif (Auth::user()->img == null && Auth::user()->gender == 'Female')
                                                        <img src="{{  asset('logo/girl.jfif') }}" alt="">
                                                        @else
                                                        <img width="400px" src="{{  asset('storage/'.Auth::user()->img) }}" alt="John Doe" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{  Auth::user()->name }} </a>
                                                    </h5>
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('account_detail') }}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('user_ui') }}">
                                                        <i class="fa-solid fa-address-book"></i>User List</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{  route('change_ui') }}">
                                                        <i class="fa-solid fa-lock"></i>Password</a>
                                                </div>
                                            <div class="account-dropdown__footer">
                                               <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-center mt-2">
                                                @csrf
                                                <button class="btn btn-danger col-10"><i class="zmdi zmdi-power"></i> Logout</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->





            @yield('content')

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
@yield('jq')
</html>
<!-- end document-->


