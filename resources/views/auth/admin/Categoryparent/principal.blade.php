@extends('layouts.masterpage')

@section('content')


            <div class="page-header">
              <h3 class="page-title">Categorías Principales</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Nuevo
                  </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva categoría</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputUsername1">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de categoría" name='name'>
                                    @error('name')
                                    <small>*{{$message}}</small> 
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <a href="" class='text-decoration-none text-light'> 
                                    <button type="button" class="btn btn-primary">
                                        crear
                                    </button>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>

                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Listado</h4>

                    <!--<div id=''></div>-->
                    
                    
                    <div class="table-responsive">
                      

                    <div>
                        {{-- If your happiness depends on money, you will never be happy with yourself. --}}


                        <table class="table align-middle mb-0">
                            <thead class="">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c as $item)
                                    <tr>
                                        <td>
                                            {{ $item->idCategoryParent }}
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ $item->name }}</p>
                                        </td>

                                        

                                        <!--BOTONES CRUD-->
                                        <td colspan="2" class='d-flex flex-wrap gap-2'>
                                            <a href=""
                                                class='text-decoration-none text-light'>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="bi bi-pen-fill"></i>
                                                </button>
                                            </a>
                                            
                                            <div>
                                                <form action="" method="POST" class='text-light' id='formulario-eliminar'>
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit"
                                                        class="btn btn-danger d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>

                                        

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>




                    </div>       


                    </div>
                  </div>
                </div>
              </div>
              
             

              
            </div>



@endsection

