@extends('layouts.masterpage')

@section('content')
@php
session()->forget('eliminar');
@endphp

            <div class="page-header">
              <h3 class="page-title">Categorías Principales</h3>
              
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crear">
                    Nuevo
                  </button>

                    <!-- Modal -->
                    <div class="modal fade" id="crear"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form class="forms-sample" id='form' action="{{route('admin.categoriaPadre.register')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}
                        
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
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody id='lista'>
                                   

                                </tbody>
                            </table>




                        </div>       


                    </div>
                  </div>
                </div>
              </div>
              
             

              
            </div>

<style>
    .swal2-title {
        font-size: 20px !important;
    }

    

</style>

@endsection




@section('js')
<script type='text/javascript'>

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        MostrarListado();

        $('#form').on('submit', function(e){
            event.preventDefault();

            var form =$(this).serialize();
            var url =$(this).attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form,
                dataType: "json",
                success: function(){
                    $('#crear').modal('hide');
                    $('#form')[0].reset();
                    MostrarListado();

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Has creado una categoría',
                        showConfirmButton: false,
                        timer: 1000,
                        width:'20em',
                        iconWidth: 10,
                        iconHeight: 10,
                    })
                    
                }
            });
        });
        
        
        $('body').on('submit','.edit-form', function(e){
            e.preventDefault();
            var form =$(this).serialize();
            var url =$(this).attr('action');
            $.post(url, form, function(data){
                $('.editmodal').modal('hide');
                MostrarListado();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Has editado una categoría',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
            //alert('a');
        });

        $('body').on('submit','.delete-form', function(e){
            e.preventDefault();
            //var id =$(this).data('id');
            var form =$(this).serialize();
            var url =$(this).attr('action');

            //alert(id);
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
                if (result.isConfirmed) {
                    /*Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )*/
                    $.post(url, form, function(){
                        MostrarListado();
                        Swal.fire(
                        'Eliminado',
                        'Has eliminado una categoría',
                        'success'
                        )
                    })
                    //this.submit();
                }
            })

            

        });

    });

    function MostrarListado(){
        $.get('{{URL::to("admin/listaCM")}}', function(data){
            $('#lista').empty().html(data);
        })
    }

    
</script>







@endsection
