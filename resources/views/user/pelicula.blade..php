@extends('layouts.MasterpageCliente')

@section('content')

<div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <h2>PELICULAS</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="Peliculas.html">En cartelera</a></li>
                            <li><a href="Estrenos.html">Proximos Estrenos</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
</div>



@endsection

