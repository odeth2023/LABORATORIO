<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Boleteria</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
  <div class="contenedorPadre">
    <div class="row contenedorHijo">
      <div class="col-md-8 DatosProductos p-4">
        
        <div class='p-0 m-0'>
          <div class="input-group mb-3 input-busqueda">
            
            
            <label style="width: 10%" class="input-group-text" for="inputGroupSelect01">Options</label>

            <div style="width: 90%" class='contenedor-form-search' id='inputGroupSelect01'>
              <select style="width: 100%" class="p-5 js-example-basic-single js-states form-control border-none" id="search_pelicula">
                @foreach ($movie as $item)
                  <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                      <div class="seat d-flex justify-content-center align-items-center">{{$i->seatNumber}}</div>
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
        <div class='DatosVenta_lista p-3'>
          @php
            $i=0;
          @endphp
          <div class='pt-3 pb-3'>Resumen de venta</div>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Total</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                
                  @php
                    $i+=1;
                  @endphp
                <tr>
                  <th scope="row">
                    {{ $i }}
                  </th>
                  <td id='Pelicula-Seleccionada'></td>
                  <td></td>
                  <td id="count2"></td>
                  <td></td>
                  <td>
                    <a href=""
                      class='text-decoration-none text-light'>
                      <button type="button" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3 "></i>
                      </button>   
                    </a>
                    
                  </td>
                </tr>
                
              </tbody>
          </table>
          
          <div id='lista-asientos-seleccionados' class='asiento-seleccionado'>
            
          </div>
        </div>

        <div class='mt-2'>
          <div class='monto'>
            <div class='monto-sub'>Subtotal</div>
            <div class='monto-sub'>Total    
              <span id="total2" class='ps-5'>0</span>
            </div>
          </div>
          
          <div class='d-flex gap-2 mt-2'>
            <button type="button" class="btn btn-primary">Finalizar Venta</button>   
            <button type="button" class="btn btn-danger">Cancelar Venta</button>
          </div>
          
        </div>
        
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

 <script>
 const lista = document.getElementById('lista-asientos-seleccionados');
  //Pelicula obtenida del buscador
  const PeliculaEncontrada = document.getElementById('search_pelicula').value;
  //Poner el nombre de la pelicula obtenida en la lista de venta
  const PeliculaSeleccionada = document.getElementById('Pelicula-Seleccionada');
  const ASIENTOS = document.querySelector('.ASIENTOS .contenedor-asientos');
  const seats = document.querySelectorAll('.row .seat:not(.occupied)');
  const count = document.getElementById('count');
  const count2 = document.getElementById('count2');
  const total = document.getElementById('total');
  const total2 = document.getElementById('total2');
  const movieSelect = document.getElementById('movie');
  const asientos_seleccionados = [];
  //var asientos_seleccionados = [];
  const div= document.createElement('div');
  //lista.appendChild(div);
  //let ticketPrice = +movieSelect.value;
  let ticketPrice = 25;
/*if(PeliculaEncontrada!=''){*/
 
  //Update total and count
  function updateSelectedCount() {
    
    lista.appendChild(div);

    
    const selectedSeats = document.querySelectorAll('.row .seat.selected');
    /*for (const e of selectedSeats) {
      if(e in  asientos_seleccionados ){
       
        continue;
      }
      else{
        asientos_seleccionados.push(e.innerHTML);
      }   
      //console.log(e.innerHTML);
      
    }*/

    for (const e of selectedSeats) {
        asientos_seleccionados.push(e.innerHTML);
      //console.log(e.innerHTML);
      
    }

    const unicos = [];
    for(var i = 0; i < asientos_seleccionados.length; i++) {
 
      const elemento = asientos_seleccionados[i];

      if (!unicos.includes(asientos_seleccionados[i])) {
        unicos.push(elemento);
      }
    }



    //console.log(asientos_seleccionados);
   
    let p= document.createElement('p');
    p.textContent=unicos;
    div.appendChild(p);
    /*for (const m of asientos_seleccionados) {
        const p= document.createElement('p');
        p.textContent=m;
        div.appendChild(p);
      }  */
      
  }
    
  
    

    //console.log(asientos_seleccionados);
    /*function addElement() {
      const p= document.createElement('p')
      p.textContent='aqui'
      lista.appendChild(p)
    }

    const showHTML=()=>{
      asientos_seleccionados.forEach(a => {
        //console.log(a);
        const contenedorAsientos=document.createElement('div');
        contenedorAsientos.appendChild('a');
        //contenedorAsientos.classList.add('asiento-seleccionado')
        //contenedorAsientos.innerHTML = `<p>${a}</p>`
        var currentDiv = document.getElementById("div1");
        document.body.insertBefore(contenedorAsientos, currentDiv);
      })
    }*/

    /*function addElement2() {
      asientos_seleccionados.forEach(a => {
      const p= document.createElement('p')
      p.textContent=a
      lista.appendChild(p)

      })
    }*/
    
//addElement2();
    //console.log(asientos_seleccionados); 
  
    

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
    }
    
    updateSelectedCount();
  });
 /* }*/
 </script>

 


<script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

 </script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>