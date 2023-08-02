@extends('layouts.masterpage')

@section('content')

<div class="card bg-dark border border-dark">
            <div class="page-header">
              <h3 class="page-title">Películas</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <button type="button" class="btn btn-primary">
                    <a href="{{route('admin.MovieManagement.register')}}" class='text-decoration-none text-light'>Nuevo</a> 
                  </button>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Listado</h4>

                    <!--<div id=''></div>-->
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>¿Cartelera?</th>
                            <th>Operaciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          

                          @foreach($movie as $item)                          
                          <tr>
                            
                           
                            <td name='id'>{{ $item->idMovie }}</td>
                            
                            <td>
                              <div class='imgP'>
                                <img class='imgPm' src='../{{ $item->img}}'> 
                              </div>
                            </td>

                            <td>{{ $item->name}}</td>
                            <td>{{ $item->description}}</td>
                            <td>{{ $item->price}}</td>
                            

                             <!--TOOGLE ACTIVAR/DESACTIVAR PELICULA (DISPONIBILIDAD)-->
                             <td data-resp="{{ $item->idMovie }}">
                                <input id='idPelicula' type="hidden" value='{{ $item->idMovie }}'>

                                <!--SI LA PELICULA ESTA EN ESTADO 0 ES QUE ESTA DESACTIVADA-->
                                @if ($item->state==0)
                                  <input data-id='{{ $item->idMovie }}' name='estado' class='estado' type="checkbox" data-toggle="switchbutton" data-onlabel="Activado" data-offlabel="Desactivado" data-onstyle="success" data-offstyle="danger">
                                

                                <!--SINO INDICA QUE ESTA ACTIVADA-->
                                @else
                                  <input data-id='{{ $item->idMovie }}' name='estado' class='estado' type="checkbox" data-toggle="switchbutton" checked data-onlabel="Activado" data-offlabel="Desactivado" data-onstyle="success" data-offstyle="danger">
                                @endif
                                
                            </td>

                            
                            <!--VERIFICAR SI PELICULA ESTA ACTIVADA O DESACTIVADA-->
                            <!--SI ESTA DESACTIVADA ENTONCES SE DESHABILITA EL BOTON DE CARTELERA-->
                            @if ($item->state==0)
                              <td id='{{ $item->idMovie }}'><input data-id='{{ $item->idMovie }}' name='estadoCartelera' class='estadoCartelera' type="checkbox" data-toggle="switchbutton" data-onlabel="OFF" data-offlabel="OFF" data-onstyle="secondary" data-offstyle="secondary" disabled></td>
                            

                            <!--SINO-->
                            @else
                            
                              <!--SE PUEDE USAR EL TOOGLE CARTELERA PARA ACTIVAR O DESACTIVAR-->
                              <td>
                                  <input id='idPelicula' type="hidden" value='{{ $item->idMovie }}'>

                                  <!--SI ESTA DESACTIVADO SE MOSTRARA LO SIGUIENTE-->
                                  @if ($item->billboard==0)
                                    <input data-id='{{ $item->idMovie }}' name='estadoCartelera' class='estadoCartelera' type="checkbox" data-toggle="switchbutton" data-onlabel="ON" data-offlabel="OFF" data-onstyle="primary" data-offstyle="secondary">
                                  

                                  <!--//SINO-->
                                  @else
                                    <input data-id='{{ $item->idMovie }}' name='estadoCartelera' class='estadoCartelera' type="checkbox" data-toggle="switchbutton" checked data-onlabel="ON" data-offlabel="OFF" data-onstyle="primary" data-offstyle="secondary">
                                  @endif
                              </td>
                            @endif

                            <!--BOTONES CRUD-->
                            <td class='d-flex gap-2'>
                              <a href="{{route('admin.MovieManagement.edit',$item)}}" class='text-decoration-none text-light'>
                                <button type="button" class="btn btn-primary"> 
                                  <i class="bi bi-pen-fill"></i>
                                </button>
                              </a>  

                              <form action="{{route('admin.MovieManagement.delete',$item->idMovie )}}" method="POST" class='text-light'>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                            <!--TOOGLE ACTIVAR/DESACTIVAR PELICULA (DISPONIBILIDAD)-->
                            
                            
                        </tbody>
                      </table>

                      @livewire('toast')
                    </div>
                  </div>
                </div>
              </div>
              
             

              
            </div>
</div>


@endsection

