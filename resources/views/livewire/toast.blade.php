<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}



    <table class="table align-middle mb-0">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>¿Cartelera?</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movie as $item)
                <tr>
                    <td>
                        {{ $item->idMovie }}
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="../{{ $item->img }}" alt="" style="width: 45px; height: 45px"
                                class="rounded-circle imgPm" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $item->name }}</p>
                                <p class="text-muted mb-0">john.doe@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $item->description }}</p>
                    </td>
                    <!--TOOGLE ACTIVAR/DESACTIVAR PELICULA (DISPONIBILIDAD)-->
                    <td data-resp="{{ $item->idMovie }}">
                        <input id='idPelicula' type="hidden" value='{{ $item->idMovie }}'>

                        <!--SI LA PELICULA ESTA EN ESTADO 0 ES QUE ESTA DESACTIVADA-->
                        @if ($item->state == 0)
                            <input data-id='{{ $item->idMovie }}' name='estado' class='estado' type="checkbox"
                                data-toggle="switchbutton" data-onlabel="Activado" data-offlabel="Desactivado"
                                data-onstyle="success" data-offstyle="danger">


                            <!--SINO INDICA QUE ESTA ACTIVADA-->
                        @else
                            <input data-id='{{ $item->idMovie }}' name='estado' class='estado' type="checkbox"
                                data-toggle="switchbutton" checked data-onlabel="Activado" data-offlabel="Desactivado"
                                data-onstyle="success" data-offstyle="danger">
                        @endif

                    </td>

                    <!--VERIFICAR SI PELICULA ESTA ACTIVADA O DESACTIVADA-->
                    <!--SI ESTA DESACTIVADA ENTONCES SE DESHABILITA EL BOTON DE CARTELERA-->
                    @if ($item->state == 0)
                        <td id='{{ $item->idMovie }}'><input data-id='{{ $item->idMovie }}' name='estadoCartelera'
                                class='estadoCartelera' type="checkbox" data-toggle="switchbutton" data-onlabel="OFF"
                                data-offlabel="OFF" data-onstyle="secondary" data-offstyle="secondary" disabled></td>


                        <!--SINO-->
                    @else
                        <!--SE PUEDE USAR EL TOOGLE CARTELERA PARA ACTIVAR O DESACTIVAR-->
                        <td>
                            <input id='idPelicula' type="hidden" value='{{ $item->idMovie }}'>

                            <!--SI ESTA DESACTIVADO SE MOSTRARA LO SIGUIENTE-->
                            @if ($item->billboard == 0)
                                <input data-id='{{ $item->idMovie }}' name='estadoCartelera' class='estadoCartelera'
                                    type="checkbox" data-toggle="switchbutton" data-onlabel="ON" data-offlabel="OFF"
                                    data-onstyle="primary" data-offstyle="secondary">


                                <!--//SINO-->
                            @else
                                <input data-id='{{ $item->idMovie }}' name='estadoCartelera' class='estadoCartelera'
                                    type="checkbox" data-toggle="switchbutton" checked data-onlabel="ON"
                                    data-offlabel="OFF" data-onstyle="primary" data-offstyle="secondary">
                            @endif
                        </td>
                    @endif

                    <!--BOTONES CRUD-->
                    <td colspan="2">
                        <a href="{{ route('admin.MovieManagement.edit', $item) }}"
                            class='text-decoration-none text-light'>
                            <button type="button" class="btn btn-primary">
                                <i class="bi bi-pen-fill"></i>
                            </button>
                        </a>
                        
                        <div>
                            <form action="{{ route('admin.MovieManagement.delete', $item->idMovie) }}" method="POST" class='text-light' id='formulario-eliminar'>
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

@section('js')


@if (session('crear')=='ok')
    <script type='text/javascript'>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Has creado una película',
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
            title: 'Has editado una película',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@if (session('eliminar')=='oki')
    <script type='text/javascript'>
       Swal.fire(
      'Eliminado',
      'Has eliminado una película',
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
