<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemovie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="../assetsCustomer/css/styleindex.css">
    <link rel="stylesheet" href="../assetsCustomer/css/prueba.css">
    <link rel="stylesheet" href="../assetsCustomer/css/body.css">
</head>

<body>
    <div class='d-flex flex-direction flex-center justify-content-around p-5'>
        <p class="text-danger fs-2">Cinemovie</p>
        <ul class="navigation">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Cartelera</a></li>
            <li><a href="">Confitería</a></li>
            <li><a href="#">Próximos Estrenos</a></li>
            

            

                    
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
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















    </div>

    
    <div class="main-panel">
   <!-- Page-header start -->
    
        <div class='container'>
            
            @yield('content')
        </div>
        
    <!-- Page-header end -->
    </div>

   

</body>


    <script src="../assetsCustomer/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://yagasaki7k.github.io/custom-scripts/font-awesome.js"></script>
</html>