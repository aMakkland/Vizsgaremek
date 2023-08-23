@php
    $categories = App\Models\Category::latest()->get();
@endphp
<!DOCTYPE html>
<html lang="hu">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>E-shop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('home/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet"
        href="{{ asset('home/https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}">
    <!-- fonts -->
    <link href="{{ asset('home/https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap') }}"
        rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('home/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <!--  -->
    <!-- owl stylesheets -->
    <link
        href="{{ asset('home/https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('home/https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css') }}"
        media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            height: 100%;
        }

        .container {}
    </style>
</head>

<body>
    <!-- banner bg main start -->
    <div class="banner_bg_main">
        <!-- banner bg main start -->
        <div class="banner_bg_main">
            <!-- header top section start -->
            <div class="container">
                <div class="header_section_top">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="custom_menu">
                                <ul>
                                    <li><a href="{{ route('user_profile') }}">Felhasználói profil</a></li>
                                    <li><a href="{{ route('new_relese') }}">Újdonságok</a></li>
                                    <li><a href="{{ route('todays_deal') }}">Napi ajánlat</a></li>
                                    <li><a href="{{ route('custom_service') }}">Vevőszolgálat</a></li>
                                    <li><a href="{{ route('checkout') }}">Pénztár</a></li>
                                    @auth
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button class="custom_menu_button" type="submit">Kijelentkezés</button>
                                            </form>
                                        </li>
                                    @endauth
                                    @guest
                                        <li>
                                            <a class="" href="{{ route('login') }}">
                                                Bejelentkezés
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="{{ route('register') }}">
                                                Regisztráció
                                            </a>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header top section start -->
        <!-- Sidebar -->

        <div class="container">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                @if (Auth::check())
                    <a href="{{ route('user_profile') }}" class="user-profile">
                        <h2>Üdvözlöm {{ Auth::user()->name }}!</h2>
                    </a>
                @else
                    <h2>Üdvözöljük vendég!</h2>
                @endif

                <div class="separator"></div> <!-- Szeparátor div -->

                <a href="{{ route('Home') }}">Főoldal</a>
                @foreach ($categories as $category)
                    <a
                        href="{{ route('category', [$category->id, $category->slug]) }}">{{ $category->category_name }}</a>
                @endforeach
            </div>
        </div>

        <div class="sidebar_toggle">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <br>
        <br>
        <br>
    </div>
    <!-- Sidebar end -->

    <!-- common part -->
    <div class="container py-5" style="margin-top: 200px">
        @yield('main-content')
    </div>
    <!-- end of common part  -->

    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a
                    href="{{ asset('home/https://html.design') }}">Free html
                    Templates</a></p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('home/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('home/js/jquery.mCustomScrollbar.concat.min.j') }}s"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>
