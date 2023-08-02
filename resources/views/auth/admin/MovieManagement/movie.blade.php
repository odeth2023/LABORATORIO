@extends('layouts.masterpage')

@section('content')


            <div class="page-header">
              <h3 class="page-title">Películas</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <button type="button" class="btn btn-primary">
                    <a href="{{route('admin.MovieManagement.register')}}" class='text-decoration-none text-light'>Nuevo</a> 
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
                      @livewire('toast')
                    </div>
                  </div>
                </div>
              </div>
              
             

              
            </div>



@endsection



