@extends('layouts.masterpage')

@section('content')

          
            <div class="page-header">
              <h3 class="page-title"> Editando Película</h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <button type="button" class="btn btn-primary"><a class="nav-link text-decoration-none text-light" href="{{route('admin.MovieManagement.movie')}}">Volver</a></button>
                </ol>
              </nav>
            </div>

            <form class="forms-sample" action="{{route('admin.MovieManagement.update',$movie)}}" method='POST' enctype='multipart/form-data'>
            {{csrf_field()}}
            @method('put')
              <div class="row">

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Default form</h4>
                            
                              <div class="form-group p-2">
                                <label for="exampleInputUsername1">Nombre</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name='name'value="{{$movie->name}}">
                                @error('name')
                                <small>*{{$message}}</small> 
                                @enderror
                              </div>
                              <div class="form-group p-2">
                                <!--text area no funciona como input-->
                                <label for="exampleTextarea1">Descripcion</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="4" name='description'>{{$movie->description}}</textarea>
                                @error('description')
                                <small>*{{$message}}</small> 
                                @enderror
                              </div>

                              
                              <div class="form-group p-2">
                                <label for="exampleInputPassword1">Precio</label>
                                <input type="text" class="form-control"  placeholder="Ejem: 2" name='price'value="{{$movie->price}}">
                                @error('price')
                                <small>*{{$message}}</small> 
                                @enderror
                              </div>
                              

                              <div class="form-group p-2">

                                <label for='img'>File upload</label>
                                <input type="file" name="img" class="form-control" id='img' value="{{$movie->img}}">
                                @error('img')
                                <small>*{{$message}}</small> 
                                @enderror
                              </div>
                            
                          </div>
                    </div>
                </div>
                
               

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                          <div class="card-body" style='height:150px;'>
                            <div class='ContenedorImage' style='width:100%;height:100%;'>
                              <img src="../{{ $movie->img}}" alt="" id='imgPreview' style='width:100%;height:100%;object-fit:contain;'>
                            </div>

                          </div>
                    </div>
                </div>
  
              </div>

              <button type="submit" class="btn btn-primary m-2" value="Save">Editar</button>

            </form>

          
        



@endsection

