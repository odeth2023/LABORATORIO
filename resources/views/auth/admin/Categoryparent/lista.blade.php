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
                                                
                                                <button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#editar-{{ $item->idCategoryParent }}">
                                                    <i class="bi bi-pen-fill"></i>
                                                </button>

                                                    <!-- Modal -->
                                                <div class="modal fade editmodal"  id="editar-{{$item->idCategoryParent}}"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <form class="forms-sample edit-form"  id='edit-form' action="{{route('admin.categoriaPadre.update',$item)}}" method='POST' enctype='multipart/form-data'>
                                                            {{csrf_field()}}
                                                            @method('put')
                                                        
                                                            <div class="modal-dialog  modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar categoría</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="exampleInputUsername1">Nombre</label>
                                                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre de categoría" name='name' value='{{ $item->name }}'>
                                                                        @error('name')
                                                                        <small>*{{$message}}</small> 
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <a href="" class='text-decoration-none text-light'> 
                                                                        <button type="submit" class="btn btn-primary edit-boton">
                                                                            editar
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                </div>        



                                                <div>
                                                    <form action="{{ route('admin.categoriaPadre.delete', $item->idCategoryParent ) }}"  method="POST" class='text-light eliminar delete-form' data-id='{{$item->idCategoryParent}}' id='formulario-eliminar'>
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