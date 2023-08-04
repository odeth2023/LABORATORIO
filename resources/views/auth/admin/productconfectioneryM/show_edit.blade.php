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
            

              <form class="forms-sample texto" action="{{route('admin.confiteria.update',$item)}}" method='POST' enctype='multipart/form-data'>
                {{csrf_field()}}
                
              
                @method('put')

                <div class="row">

                  <div class="grid-margin stretch-card">
                      
                      <div class="card">

                            <div class="card-body col-md-12">

                              <div class="row p-2">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputUsername1">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de producto" name='name'  value="{{$item->name}}">
                                    @error('name')
                                    <small>*{{$message}}</small> 
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group p-2">
                                    <label for="exampleTextarea1">Descripcion</label>
                                    <textarea class="form-control" id="exampleTextarea1"  name='description'>{{$item->description}}</textarea>
                                    @error('description')
                                    <small>*{{$message}}</small> 
                                    @enderror
                                </div>
                                 
                                <div class="col-md-6">
                                  <div class="row p-2">

                                    <div class="col-12 mb-4">
                                      <label for="inputState" class="form-label">Categoría</label>
                                      <select name='idCategoryChild' id="inputState" class="form-select">
                                          @foreach($productconfectionery2 as $item) 
                                          <option value="{{$item->idTipoCategoria}}" selected>{{$item->NombreTipoCategoria}}</option>
                                          @endforeach
                                          <!---->
                                          @foreach ($categorychild as $item2)  
                                            @if($item2->idCategoryChild==$item->idCategoryChild)
                                              @continue;
                                            
                                            @else
                                            <option value="{{ $item2->idCategoryChild}}">{{ $item2->name}}</option>
                                            @endif
                                          @endforeach
                                        
                                      </select>

                                      @error('idCategoryChild')
                                        <small>*{{$message}}</small> 
                                      @enderror
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="exampleInputPassword1">Precio</label>
                                        <input type="text" class="form-control"  placeholder="Ejem: 2" name='price' value="{{$item->price}}">
                                        @error('price')
                                        <small>*{{$message}}</small> 
                                        @enderror
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="exampleInputPassword1">Quantity</label>
                                        <input type="text" class="form-control"  placeholder="Ejem: 2" name='quantity' value="{{$item->quantity}}">
                                        @error('quantity')
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
                                <label for='img'>Portada de producto</label>
                                <input type="file" name="img" class="form-control" id='img' value="{{$item->img}}">
                                @error('img')
                                <small>*{{$message}}</small> 
                                @enderror

                              </div>

                              <div class='ContenedorImage p-3'>
                                <div>
                                  <img src="../{{$item->img}}" alt="" id='imgPreview' >
                                </div>
                                
                              </div>

                            </div>
                      </div>
                </div>

                
                <button type="submit" class="btn btn-primary  p-2" value="Save">Editar Producto</button>


              

              </form>

          
             

              

@endsection




