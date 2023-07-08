@extends('layouts.masterpage')

@section('content')

          
            <div class="page-header">
              <h3 class="page-title"> Registro de Nueva Película</h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <button type="button" class="btn btn-primary"><a class="nav-link text-decoration-none text-light" href="{{route('admin.MovieManagement.movie')}}">Volver</a></button>
                </ol>
              </nav>
            </div>

            <form class="forms-sample texto" action="{{route('admin.movie.register')}}" method='POST' enctype='multipart/form-data'>
            {{csrf_field()}}
              <div class="row">

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Default form</h4>
                            
                              <div class="form-group p-2">
                                <label for="exampleInputUsername1">Nombre</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name='name'>
                              </div>
                              <div class="form-group p-2">
                                <label for="exampleTextarea1">Descripcion</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="4" name='description'></textarea>
                              </div>

                              
                              <div class="form-group p-2">
                                <label for="exampleInputPassword1">Precio</label>
                                <input type="text" class="form-control"  placeholder="Ejem: 2" name='price'>
                                @error('price')
                                <small>*{{$message}}</small> 
                                @enderror
                              </div>
                              

                              <div class="form-group p-2">

                                <label for='img'>File upload</label>
                                <input type="file" name="img" class="form-control" id='img'>

                              </div>
                            
                          </div>
                    </div>
                </div>
                
               

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                          <div class="card-body">
                            <div class='ContenedorImage'>
                              <img src="images/preview.png" alt="" id='imgPreview' >
                            </div>

                          </div>
                    </div>
                </div>
  
              </div>

              <button type="submit" class="btn btn-primary m-2" value="Save">Registrar Pelicula</button>

            </form>

          
        

              <style>
            </style>

@endsection

