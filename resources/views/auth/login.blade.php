
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assetsCustomer/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>LOGIN</title>
</head>

<body>
    <div class="header">
        <div class="logo">
            <!--<a href="#"><img src="img/netflixlogo.png" alt=""></a>-->
            <a class="text-danger fs-3 fw-bolder text-decoration-none" href="">Cinemovie</a>
        </div>
    </div>

    <!--usuario, clave, ingresar -->
    <div class="login_body">
        <div class="login_box">
            
            <h2>Entrar</h2>
            <form method="post" action="{{ route('login') }}">
              @csrf
                <div class="input_box">
                <label>Username or email *</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="input_box">
                    
                    <label>Password *</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div>
                    <input class="mb-3 submit" type="submit">{{ __('Login') }}</input>
    
                   

                </div>
                
            </form>

            <div class="support">
                <div class="remember">
                    <span><input type="checkbox" style="margin: 0;padding: 0; height: 13px;"></span>
                    <span>Lembre-se de mim</span>
                </div>
                <div class="help">
                    <a href="#">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            </div>

            <div class="login_footer pt-3">

                <div class="sign_up">
                    <p>¿Nuevo por aquí? <a href="#">Registrate Ahora</a></p>
                </div>

                
            </div>
        </div>
    </div>
</body>

</html>