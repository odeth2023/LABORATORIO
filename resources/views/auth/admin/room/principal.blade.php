@extends('layouts.masterpage')

@section('content')


            <div class="page-header">
              <h3 class="page-title">Salas del Cine</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Nueva Sala
                  </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form class="forms-sample" action="{{route('admin.room.register')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}
                        
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva Sala</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputUsername1">Nombre de Sala</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de sala" name='roomNumber'>
                                        @error('roomNumber')
                                        <small>*{{$message}}</small> 
                                        @enderror
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputUsername1">Número de asientos</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Cantidad de asientos" name='NumberSeats'>
                                        @error('NumberSeats')
                                        <small>*{{$message}}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <a href="" class='text-decoration-none text-light'> 
                                        <button type="submit" class="btn btn-primary">
                                            crear
                                        </button>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </form>
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
                            <table class="table align-middle mb-0">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>Número de sala</th>
                                        <th>Número de asientos</th>
                                        <th>Estado</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sala as $item)
                                        <tr>
                                            <td>
                                                {{ $item->idRoom }}
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $item->roomNumber }}</p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $item->NumberSeats}}</p>
                                            </td>
                                            <td>
                                                @if($item->state==1)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Activado</label>
                                                </div>
                                                @else
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Desactivado</label>
                                                </div>            
                                                @endif
                                            </td>
                                            

                                            <!--BOTONES CRUD-->
                                            <td colspan="2" class='d-flex flex-wrap gap-2'>
                                                
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar-{{$item->idRoom}}">
                                                    <i class="bi bi-pen-fill"></i>
                                                </button>

                                                    <!-- Modal -->
                                                <div class="modal fade" id="editar-{{$item->idRoom}}"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <form class="forms-sample edit-form" action="{{route('admin.room.update',$item)}}" method='POST' enctype='multipart/form-data'>
                                                            {{csrf_field()}}
                                                            @method('put')
                                                        
                                                            <div class="modal-dialog  modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar sala</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">

                                                                        <div class="col-12 mb-4 form-group">
                                                                            <label for="inputState" class="form-label">Editando sala</label>
                                                                        </div>

                                                                        <div class="col-md-12 form-group">
                                                                            <label for="exampleInputUsername1">Nombre de Sala</label>
                                                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de categoría" name='roomNumber' id='roomNumber'  value='{{ $item->roomNumber }}'>
                                                                            @error('roomNumber')
                                                                            <small>*{{$message}}</small> 
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-md-12 form-group">
                                                                            <label for="exampleInputUsername1">Número de asientos</label>
                                                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de categoría" name='NumberSeats' id='NumberSeats' value='{{ $item->NumberSeats }}'>
                                                                            @error('NumberSeats')
                                                                            <small>*{{$message}}</small> 
                                                                            @enderror
                                                                        </div>

                                                                        
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        <a href="" class='text-decoration-none text-light'> 
                                                                            <button type="submit" class="btn btn-primary">
                                                                                editar
                                                                            </button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                </div>        



                                                <div>
                                                    <form action="{{ route('admin.room.delete', $item->idRoom) }}" method="POST" class='text-light' id='formulario-eliminar'>
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




@section('js')




@if (session('crear')=='ok')
    <script type='text/javascript'>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Has creado una Sala',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@if (session('editar')=='ok')
    <script type='text/javascript'>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Has editado una Sala',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@if (session('eliminar')=='oki')
    <script type='text/javascript'>
       Swal.fire(
      'Eliminado',
      'Has eliminado una Sala',
      'success'
    )
    </script>

@endif

<script type='text/javascript'>
    
    document.getElementById("formulario-eliminar").addEventListener("submit", function(event){
            
        event.preventDefault()
        Swal.fire({
            title: '¿Desea eliminar?',
            text: "Una vez eliminado no recuperarás los datos",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {
                /*Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )*/
                this.submit();
            }
        })


    });

        
    
</script>
@endsection
