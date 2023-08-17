@extends('layouts.masterpage')

@section('content')


            <div class="page-header">
              <h3 class="page-title">Productos</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <button type="button" class="btn btn-primary">
                    <a href="{{route('admin.confiteria.vistaregistro')}}" class='text-decoration-none text-light'>Nuevo</a> 
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
                    <div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


    <div>

    </div>

    <table class="table align-middle mb-0">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
                <tr>
                    <td>
                        {{ $item->idConfectionery}}
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="../{{ $item->img }}" alt="" style="width: 45px; height: 45px"
                                class="rounded-circle imgPm" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $item->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity}}</td>
                    <!--TOOGLE ACTIVAR/DESACTIVAR PELICULA (DISPONIBILIDAD)-->
                    <td>
                        

                        <!--SI LA PELICULA ESTA EN ESTADO 0 ES QUE ESTA DESACTIVADA-->
                        @if ($item->state == 0)
                            <input data-id='' name='estado' class='estado' type="checkbox"
                                data-toggle="switchbutton" data-onlabel="Activado" data-offlabel="Desactivado"
                                data-onstyle="success" data-offstyle="danger">


                            <!--SINO INDICA QUE ESTA ACTIVADA-->
                        @else
                            <input data-id='' name='estado' class='estado' type="checkbox"
                                data-toggle="switchbutton" checked data-onlabel="Activado" data-offlabel="Desactivado"
                                data-onstyle="success" data-offstyle="danger">
                        @endif

                    </td>


                    <!--BOTONES CRUD-->
                    <td colspan="2">
                        
                                                 
                        <a href="{{ route('admin.confiteria.edit', $item) }}" class='text-decoration-none text-light'>
                        
                            <button type="button" class="btn btn-primary">
                                <i class="bi bi-pen-fill"></i>
                            </button>
                        </a>
                        
                        <div>
                            <form action="{{ route('admin.confiteria.delete', $item->idConfectionery) }}" method="POST" class='text-light' id='formulario-eliminar'>
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
            title: 'Has creado un producto',
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
            title: 'Has editado un producto',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@if (session('eliminar')=='oki')
    <script type='text/javascript'>
       Swal.fire(
      'Eliminado',
      'Has eliminado un producto',
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
