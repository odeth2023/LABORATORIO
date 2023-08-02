@extends('layouts.masterpage')

@section('content')


           <div class="grid-margin stretch-card">
              <div class="card pt-0">
                <div class="card-body pb-0">
                  <div class="page-header">
                    <h3 class="page-title"> Ventas</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-margin stretch-card">
            <div class="card">
              <div class="card-body col-md-12">
                  <h3 class="page-title pb-3"> Mis aplicaciones</h3>

                  <div class="row aplicaciones p-2 gap-4">
                    <a class="col-md-2" href="{{route('admin.ventaPelicula')}}" target="_blank">
                      <div class=" app p-0">
                          <p class='texto'>Boletería</p>
                      </div>
                    </a>

                    <a class="col-md-2" href="{{route('admin.ventaConfiteria')}}" target="_blank">
                      <div class="app p-0">
                          <p class='texto'>Confitería</p>
                      </div>
                    </a>
                      
                  </div> 
              </div>    
            </div>  
            </div>

            <style>
                .aplicaciones{
                 

                }

                .aplicaciones .app{
                  position:relative;
                  border:1px solid white;
                  border-radius:0.2rem;
                  height:8.5rem;
                  color:black;
                  background-color:white;
                  display:flex;
                  justify-content:center;
                }

                .aplicaciones .app:hover{
                  box-shadow:0px 0px 5px 0px white;
                  transition:ease-in-out;
                }

                .texto{
                  position:absolute;
                  bottom:0px;
                }
            </style>
@endsection

