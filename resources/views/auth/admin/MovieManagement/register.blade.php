@extends('layouts.masterpage')

@section('content')

            <div class="grid-margin stretch-card">
              <div class="card pt-0">
                <div class="card-body pb-0">
                  <div class="page-header">
                    <h3 class="page-title"> Registro de Nueva Película</h3>

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <button type="button" class="btn btn-primary"><a class="nav-link text-decoration-none text-light" href="{{route('admin.MovieManagement.movie')}}">Volver</a></button>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
            </div>

              <form class="forms-sample texto" action="{{route('admin.movie.register')}}" method='POST' enctype='multipart/form-data'>
                {{csrf_field()}}
              
              

                <div class="row">

                  <div class="grid-margin stretch-card">
                      
                      <div class="card">

                            <div class="card-body col-md-12">

                              <div class="row p-2">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputUsername1">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de pelicula" name='name'>
                                    @error('name')
                                    <small>*{{$message}}</small> 
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group p-2">
                                    <label for="exampleTextarea1">Descripcion</label>
                                    <textarea class="form-control" id="exampleTextarea1"  name='description'></textarea>
                                    @error('description')
                                    <small>*{{$message}}</small> 
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                  <div class="row p-2">

                                    <div class="col-12 mb-4">
                                      <label for="inputState" class="form-label">Categoría</label>
                                      <select name='idCategoryChild' id="inputState" class="form-select">
                                          <option value="" selected>Seleccionar..</option>
                                        @foreach ($categorychild as $item)  
                                          <option value="{{ $item->idCategoryChild}}">{{ $item->name}}</option>
                                        @endforeach
                                      </select>
                                      @error('idCategoryChild')
                                        <small>*{{$message}}</small> 
                                      @enderror
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="exampleInputPassword1">Precio</label>
                                        <input type="text" class="form-control"  placeholder="Ejem: 2" name='price'>
                                        @error('price')
                                        <small>*{{$message}}</small> 
                                        @enderror
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="duracion">Duracion</label>
                                        <input class="form-control" type="time" name="duracion" value="00:00:00" max="05:00:00" min="01:00:00" step="1"> 
                                        @error('duracion')
                                        <small>*{{$message}}</small> 
                                        @enderror
                                    </div>

                                  </div>
                                </div>

                                

                              </div>
              
                            </div>
                      </div>
                  </div>
                  
                

                  
    
                </div>

                <div class="col-md-12 grid-margin stretch-card">

                      <div class="card p-2">
                            <div class="card-body">
                              <div class="form-group">
                                <label for='img'>Portada de película</label>
                                <input type="file" name="img" class="form-control" id='img'>
                                @error('img')
                                <small>*{{$message}}</small> 
                                @enderror

                              </div>

                              <div class='ContenedorImage p-3'>
                                <div>
                                  <img src="images/preview.png" alt="" id='imgPreview' >
                                </div>
                                
                              </div>

                            </div>
                      </div>
                </div>

                
                <button type="submit" class="btn btn-primary  p-2" value="Save">Registrar Pelicula</button>


              

              </form>

          
             

              

@endsection




