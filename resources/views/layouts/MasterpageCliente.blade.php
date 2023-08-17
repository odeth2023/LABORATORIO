<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peliculas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="icon" href="../assetsCustomer/images/peli.png" type="image/x-icon">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Pelicula/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Pelicula/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Pelicula/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Pelicula/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Pelicula/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Pelicula/slicknav.min.css')}}"type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Pelicula/style.css')}}" type="text/css">

    <!-- Css Confiteria 
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Confiteria/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assetsCustomer/css/Confiteria/style.css')}}" type="text/css">-->
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-around">

                    <div class="header__logo">
                        <a href="{{ route('user.home') }}">
                            <img src="../assetsCustomer/images/logo.png" alt="">
                        </a>
                    </div>

                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('user.home') }}">Inicio</a></li>
                            <li><a href="{{ route('user.peliculas') }}">Peliculas</a></li>
                            <li><a href="{{ route('user.confiteria') }}">Confiteria</a></li>

                                <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li>
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li>
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('compras.home') }}">{{ __('Compras') }}</a>
                                </li>
                            @endguest    
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
        
    </header>
    <!-- Header Section End -->
    
    <!-- Product Section Begin -->
    <section class="product spad">
        @yield('content')   
    </section>

    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="#">
                                <img src="img/logo1.png" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../assetsCustomer/js/Pelicula/jquery-3.3.1.min.js"></script>
    <script src="../assetsCustomer/js/Pelicula/bootstrap.min.js"></script>
    <script src="../assetsCustomer/js/Pelicula/jquery.nice-select.min.js"></script>
    <script src="../assetsCustomer/js/Pelicula/jquery-ui.min.js"></script>
    <script src="../assetsCustomer/js/Pelicula/jquery.slicknav.js"></script>
    <script src="../assetsCustomer/js/Pelicula/mixitup.min.js"></script>
    <script src="../assetsCustomer/js/Pelicula/owl.carousel.min.js"></script>
    <script src="../assetsCustomer/js/Pelicula/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>