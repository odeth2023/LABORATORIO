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
                            <li><a href="{{route('user.peliculas')}}">En cartelera</a></li>
                            <li class="active"><a href="{{route('user.estrenos')}}">Proximos Estrenos</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
</div>

<div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Filtrar Por</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Ciudad 
                                        <small class="text-muted"></small>
                                    </a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">Lima 
                                                <small class="text-muted"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Dia
                                        <small class="text-muted"></small>
                                    </a>
                                    <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">Hoy
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">Mañana
                                                <small class="text-muted"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men3">Género
                                        <small class="text-muted"></small>
                                    </a>
                                    <div class="" id="sub-men3" data-parent="#list-group-men">
                                        
                                        @foreach($c as $item)
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="form-check ms-1">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        {{$item->name}}
                                                    </label>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>

                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men4" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men4">Idioma
                                        <small class="text-muted"></small>
                                    </a>
                                    <div class="collapse" id="sub-men4" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">DOBLADA 
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">SUBTITULAD 
                                                <small class="text-muted"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men5" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men5">Formato
                                        <small class="text-muted"></small>
                                    </a>
                                    <div class="collapse" id="sub-men5" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">2D 
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">3D 
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">PRIME 
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">REGULAR 
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">XTREME 
                                                <small class="text-muted"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men6" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men6">Censura
                                        <small class="text-muted"></small>
                                    </a>
                                    <div class="collapse" id="sub-men6" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">+14 
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">+14 DNI 
                                                <small class="text-muted"></small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">APT
                                                <small class="text-muted"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                            <div class="row">
                            




                            </div>
                        </div>
                    </div>

                    <div class="product__pagination">
                        <a href="Peliculas.html">
                            <i class="fa fa-long-arrow-left"></i>
                        </a>
                        <a href="Peliculas.html">1</a>
                        <a href="2.1.html">2</a>
                        <a href="3.1.html">3</a>
                        <a href="3.1.html">
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

@endsection

