@extends('layouts.masterpage')

@section('content')


            <div class="page-header">
              <h3 class="page-title">Asientos</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Nuevo
                  </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form class="forms-sample" action="{{route('admin.seat.register')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}
                        
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo Asiento</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    

                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputUsername1">Nombre//Número</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de categoría" name='seatNumber'>
                                        @error('name')
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
                        {{-- If your happiness depends on money, you will never be happy with yourself. --}}


                        <table class="table align-middle mb-0">
                            <thead class="">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seat as $item)
                                    <tr>
                                        <td>
                                            {{ $item->idSeat }}
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ $item->seatNumber}}</p>
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
            title: 'Has creado un asiento',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@php

session()->forget('crear');

@endphp

@endif

@if (session('editar')=='ok')
    <script type='text/javascript'>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Has editado una Sub-categoría',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@if (session('eliminar')=='oki')
    <script type='text/javascript'>
       Swal.fire(
      'Eliminado',
      'Has eliminado una Sub-categoría',
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




