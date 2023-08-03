@extends('layouts.masterpage')

@section('content')

            <div class="grid-margin stretch-card">
              <div class="card pt-0">
                <div class="card-body pb-0">
                  <div class="page-header">
                    <h3 class="page-title">Editando Producto</h3>

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <button type="button" class="btn btn-primary"><a class="nav-link text-decoration-none text-light" href="{{route('admin.confiteria')}}">Volver</a></button>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            

              <form class="forms-sample texto" action="" method='POST' enctype='multipart/form-data'>
                {{csrf_field()}}
              
                @method('put')

                <div class="row">

                  <div class="grid-margin stretch-card">
                      
                      <div class="card">

                            <div class="card-body col-md-12">

                              <div class="row p-2">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputUsername1">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de producto" name='name'  value="{{$p->name}}">
                                    @error('name')
                                    <small>*{{$message}}</small> 
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group p-2">
                                    <label for="exampleTextarea1">Descripcion</label>
                                    <textarea class="form-control" id="exampleTextarea1"  name='description'>{{$p->description}}</textarea>
                                    @error('description')
                                    <small>*{{$message}}</small> 
                                    @enderror
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
                                <label for='img'>Portada de producto</label>
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

                
                <button type="submit" class="btn btn-primary  p-2" value="Save">Editar Producto</button>


              

              </form>

          
             

              

@endsection




