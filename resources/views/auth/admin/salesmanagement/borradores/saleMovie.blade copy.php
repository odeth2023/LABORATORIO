<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Boleteria</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- TOKEN AJAX-->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div class="contenedorPadre">
    <div class="row contenedorHijo">
      <div class="col-md-8 DatosProductos p-4">
        
        <div class='p-0 m-0'>
          <div class="input-group mb-3 input-busqueda">
            
            
            <label style="width: 10%" class="input-group-text">Options</label>

            <div style="width: 90%" class='contenedor-form-search'>
              <select style="width: 100%" class="p-5 js-example-basic-single js-states form-control border-none SELECCION_MOVIE" id="search_pelicula">
                @foreach ($movie as $item)
                  <option value="{{ $item->name }}" >{{ $item->name }}</option>
                @endforeach  
              </select>
            </div>
            
            
            <!-- id='search_pelicula' -->
          </div>

          

          <div class='funcion mb-2'>
            <label>Funciones Disponibles: </label>
            <select id="FUNCIONES-PELICULA-CARTELERA">
              <option value="250">Interstellar (Rs. 250)</option>
              <option value="200">Kabir Singh (Rs. 200)</option>
              <option value="150">Duniyadari (Rs. 150)</option>
              <option value="100">Natsamrat (Rs. 100)</option>
            </select>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class='SELECCION-ASIENTOS pt-2'>
              <div class="screen"></div>
            
              <div class='ASIENTOS'>
                  <div class="row contenedor-asientos">
                    @foreach ($seat as $i)
                      <div id='asiento' class="seat d-flex justify-content-center align-items-center">{{$i->seatNumber}}</div>
                    @endforeach
                  </div>
               
               
              </div>

              <ul class="showcase mt-2">
                <li>
                  <div class="seat"></div>
                  <small>N/A</small>
                </li>
                <li>
                  <div class="seat azul"></div>
                  <small>Seleccionado</small>
                </li>
                <li>
                  <div class="seat occupied"></div>
                  <small>Occupado</small>
                </li>    
              </ul>
              
              <p class="text">Tu has seleccionado
              <span id="count">0</span> asientos por el precio total de S/. 
              <span id="total">0</span>
              </p>

            </div>
          </div>
        </div>


      
        <div class="col-md-4 DatosVenta p-2 m-0">
          <form class="forms-sample" id='form' action="" method='get' enctype='multipart/form-data'>
              {{csrf_field()}}
            <div class='DatosVenta_lista p-3'>
              @php
                $i=0;
              @endphp
              <div class='pt-3 pb-3 fs-5'>Resumen de venta</div>
              <div class="mb-3 pb-3 border-bottom border-danger d-flex flex-column justify-content-center">
                <div class="d-flex gap-1">
                  <div class='contenedor-icono'>
                    <i class="bi bi-camera-reels-fill" ></i>
                  </div>
                  
                  <label>Pelicula</label>
                </div>

                <p id='Pelicula-Seleccionada' class='m-0 p-2 text-center fs-3' name='pelicula' value='pelicula'></p>
              </div>

              <div class="row p-3">
                <div class="col-4 mb-3 pb-3 border-bottom border-secondary-subtle d-flex flex-column justify-content-center">
                  <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                    <div class='contenedor-icono'>
                      <img src="../assets/images/icons/funcion.png" width='100%' height='100%'>
                    </div>
                  
                    <label>Función</label>
                  </div>
                  
                  <p id=''></p>
                </div>

                <div class="col-4 mb-3 pb-3 border-bottom border-secondary-subtle d-flex flex-column justify-content-center">
                  <div class="d-flex  flex-column gap-1 justify-content-center align-items-center">
                    <div class='contenedor-icono'>
                      <i class="bi bi-calendar"></i>
                    </div>
                  
                    <label>Fecha</label>
                  </div>
                  
                  <p id=''></p>
                </div>

                <div class="col-4 mb-3 pb-3 border-bottom border-secondary-subtle d-flex flex-column justify-content-center">
                  <div class="d-flex  flex-column gap-1 justify-content-center align-items-center">
                    <div class='contenedor-icono'>
                      <i class="bi bi-clock"></i>
                    </div>
                  
                    <label>Hora</label>
                  </div>
                  
                  <p id=''></p>
                </div>
              </div>

              <div class="mb-3 pb-3 border-bottom border-danger d-flex flex-column justify-content-center">
                <div class="d-flex gap-1">
                  <div class='contenedor-icono'>
                    <img src="../assets/images/icons/entrada.png" width='100%' height='100%'>
                  </div>
                
                  <label>Entradas</label>
                </div>
                
                <div class="me-4 d-flex justify-content-end gap-5" style='font-size:13px;'>
                  <div class="d-flex gap-5">
                    <p class='p-0 m-0'>Cantidad</p>
                    <p id="count2" class='p-0 m-0'></p>
                  </div>

                  <p id="count2" class='p-0 m-0'>$/.zz</p>
                  
                </div>
                
              </div>

              <div class="pb-3 border-bottom border-danger d-flex gap-4 align-items-center">
                <div class="d-flex gap-1">
                  <div class='contenedor-icono'>
                    <img src="../assets/images/icons/butacas.png" width='100%' height='100%'>
                  </div>
                
                  <label>Tus Butacas: </label>
                </div>
                
                <div id='lista-asientos-seleccionados' class='asiento-seleccionado'></div>
                
              </div>

            </div>

            <div class='mt-2'>
              <div class='monto'>
                <!--<div class='monto-sub'>Subtotal</div>-->
                <div class='monto-sub'>Total    
                  <span id="total2" class='ps-5'>0</span>
                </div>
              </div>
              
              <div class='d-flex gap-2 mt-2'>
                <button type="submit" class="btn btn-primary">Finalizar Venta</button>   
                <button type="button" class="btn btn-danger">Cancelar Venta</button>
              </div>
              
            </div>
          </form>
        </div>
      

    </div>
  </div>

  
  

  <style>
    .monto-sub{
      padding-left:70%;
    }

    table{
      font-size:13px;
    }
    body{
      box-sizing:border-box;
      margin: 0;
      padding:0;
      background-color:rgba(0,0,0,.1);
      width:100%;
      max-height:100vh;
    }

    .contenedorPadre{
      width: 100%;
      max-height:100vh;
      display:flex;
      justify-content:center;
    }

    .contenedorHijo{
      /*border:3px solid black;*/
      width:98%;
    }

    .DatosProductos{
      /*border:1px solid red;*/
      
      overflow-y:scroll;
      max-height:100vh;
    }

    .DatosVenta{
      /*border:1px solid red;*/
      max-height:100vh;
    }

    .monto{
      display:flex;
      flex-direction:column;
    }


    .DatosVenta_lista{
      max-height:80vh;
      min-height:80vh;
      background-color:white;
      overflow:auto;
      border-radius: 5px;
    }

    .disabled_1{
      position:relative;
      
    }

    .disabled_2{
      position:absolute;
      width:100%;
      height:100%;
      z-index:100;
      background-color:rgba(255,255,255,.8);
    }
  </style>

 <style>

    .contenedor-icono{
      width:20px;
      height:20px;
      display:flex;
      justify-content:center;
      align-items:center;
    }

    .asiento-seleccionado div{
      display:flex;
      flex-wrap:wrap;
      gap:5px;
    }

    .asiento-seleccionado div p{
      border:1px solid red;
      padding:2px;
      border-radius:15%;
      font-size:11px;
    }

  .input-busqueda{
    width:100%;
    height:100%;
  }

  .select2-selection__rendered {
      line-height: 40px !important;
  }
  .select2-container .select2-selection--single {
      height: 40px !important;
  }
  .select2-selection__arrow {
      height: 40px  !important;
  }

  .funcion select {
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    border: 0;
    padding: 5px 15px;
    font-size: 14px;
    border-radius: 5px;
  }

  .screen {
    background: #fff;
    height: 20px;
    width: 82%;
    margin: 15px 0;
    /*transform: rotateX(-45deg);*/
    box-shadow: 0 3px 10px rgba(255,255,255,0.7);
  }

  .seat {
    background-color: #444451;
    height: 24px;
    width: 20px;
    margin: 3px;
    /*border-top-left-radius: 10px;
    border-top-right-radius: 10px;*/
    border-radius:50%;
    font-size:0.7rem;
  }

  .selected {
    background-color: #0081cb;
  }

  .azul{
    background-color: #0081cb;
  }

  .occupied {
    background-color: #fff;
  }

  .ASIENTOS{
    width:80%;
    /*border:1px solid red;*/
    display:flex;
    justify-content:center;
    align-items:center;
  }

  .contenedor-asientos {
    display: grid;
    grid-template-columns: repeat(20,1fr);
    width:100%;
    /*border:1px solid blue;*/
  }

  .contenedor-asientos div:nth-of-type(5) {
    
    /*background:red;*/
    margin-right: 2.5rem;
  }

  .contenedor-asientos div:nth-child(20n+15) {
    /*background:red;*/
    margin-left: 2.5rem;
  }

  .seat:not(.occupied):hover {
    cursor: pointer;
    transform: scale(1.2);
  }

  .showcase .seat:not(.occupied):hover {
    cursor: default;
    transform: scale(1);
  }

  .showcase {
    display: flex;
    justify-content: space-between;
    list-style-type: none;
    background: rgba(0,0,0,0.1);
    border-radius: 5px;
    color: #777;
  }

  .showcase li {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
  }

  .showcase li small {
    margin-left: 2px;
  }

  .SELECCION-ASIENTOS {
    background-color: #242333;
    color: #fff;
    width:100%;
    display: flex;
    flex-direction:column;
    align-items: center;
    justify-content: center;
  }


  p.text span {
    color: #0081cb;
    font-weight: 600;
    box-sizing: content-box;
  }

  
 </style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


 <script type='text/javascript'>
  //Pelicula obtenida del buscador
  const BUSCADOR = document.getElementById('SELECCION_MOVIE');
  const PeliculaEncontrada = document.getElementById('search_pelicula').value;
  //Poner el nombre de la pelicula obtenida en la lista de venta
  const PeliculaSeleccionada = document.getElementById('Pelicula-Seleccionada');
  const ASIENTOS = document.querySelector('.ASIENTOS');
  const seats = document.querySelectorAll('.row .seat:not(.occupied)');
  const count = document.getElementById('count');
  const count2 = document.getElementById('count2');
  const total = document.getElementById('total');
  const total2 = document.getElementById('total2');
  const movieSelect = document.getElementById('movie');

  const asientos_seleccionados = [];
  const lista = document.getElementById('lista-asientos-seleccionados');
  var div= document.createElement('div');
  //div.classList.add('mydiv');
  lista.appendChild(div);

  //var json = {};

  //let ticketPrice = +movieSelect.value;
  let ticketPrice = 25;

  function pelicula_encontrada(){
      PeliculaSeleccionada.innerText = PeliculaEncontrada;
    }

  if(PeliculaSeleccionada!=''){
    //Update total and count
    function updateSelectedCount() {
      const selectedSeats = document.querySelectorAll('.row .seat.selected');
      const selectedSeatsCount = selectedSeats.length;
      count.innerText = selectedSeatsCount;
      count2.innerText = selectedSeatsCount;
      
      total.innerText = selectedSeatsCount * ticketPrice;
      total2.innerText = selectedSeatsCount * ticketPrice;
      /*if( total.innerText>0){
        PeliculaSeleccionada.innerText = PeliculaEncontrada;
        
      }
      else{
        PeliculaSeleccionada.innerText=' ';
      }*/
    }
   
    function carrito() {
      div= document.createElement('div');
      //div.classList.add('mydiv');
      lista.appendChild(div);
      asientos_seleccionados.splice(0,asientos_seleccionados.length);
      
      const selectedSeats2 = document.querySelectorAll('.row .seat.selected');
      for (const e of selectedSeats2) {
        if(e in asientos_seleccionados){
          continue;
        }
        else{
          asientos_seleccionados.push(e.innerHTML);
        }
          
    }

    for (const n of asientos_seleccionados) {
      const p= document.createElement('p');

      p.textContent=n;
      div.appendChild(p);
    }
    //console.log(asientos_seleccionados);

    /*const p= document.createElement('p');
    
    p.textContent=asientos_seleccionados;
    div.appendChild(p);*/

    
        //console.log(json);

  }

  /*BUSCADOR.addEventListener('click', e => {
    console.log('a');
  });*/

  

  //Movie Select Event
  ASIENTOS.addEventListener('change', e => {
    ticketPrice = +e.target.value;
    updateSelectedCount();
  });

  //Seat click event
  ASIENTOS.addEventListener('click', e => {
    
    if (e.target.classList.contains('seat') &&
      !e.target.classList.contains('occupied')) {
      e.target.classList.toggle('selected');

      div.parentNode.removeChild(div);
      /*console.log(lista);*/
      updateSelectedCount();
      carrito();
      console.log(lista);


      /*if(document.getElementsByClassName("mydiv") !== null){
        //lista.removeChild(div);
        updateSelectedCount();
        carrito();
        console.log('aqui estoy :D')
        }

      else{ 
        lista.removeChild(div)
          updateSelectedCount();
          carrito();
          console.log('buuuu')
        } */
    }
    

    
    
  });
  }

  var butacas=asientos_seleccionados;
  //var pelicula=

  $(document).ready(function() {
        $('.js-example-basic-single').select2();
  });

  /*$(document).ready(function(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#form').on('submit', function(e){
            event.preventDefault();
            var filas = [];
            //console.log(c); RECONOCE EL ARRAY ENVIADO

            //var codigo = 1;
            //var mono =  2;
            //var form =$(this).serialize();
            //var url =$(this).attr('action');
            var fila = {
              butacas_venta:butacas
            };
            filas.push(fila);//AQUI SE AGREGA AL ARRAY EL JSON CON LOS DATOS

            //console.log(filas); SI ENVIA A LA CONSOLA EL JSON CON LA CLAVE CODIGO PARA EL ARRAY

            /*$.ajax({
                type: "get",
                url: "{{URL::to('VMG/pelicula')}}",
                data: {valores : JSON.stringify(filas)},
                /*dataType: "json",
                success: function(data){
                    
                    console.log(data)
                }
              });
        });

  });*/
 </script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>