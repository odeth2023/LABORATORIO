<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Confiteria</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
  <div class="contenedorPadre">
    <div class="row contenedorHijo">
      <div class="col-md-8 DatosProductos p-4">
        
        <div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
             <i class="bi bi-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Producto a buscar" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
       
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
          
        @foreach ($producto as $item)
            @foreach ($carrito as $item2)
              @if ($item->idConfectionery == $item2->idConfectionery) 

                <div class="col-3">
                  
                  <a href="" class='text-decoration-none'>
                        <div class="card h-100 disabled_1">
                        <div class="disabled_2"></div>
                          <img src="https://www.importadoraespinoza.com/Dinamic/Assets/img/no_image.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-title">$item->name</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                            <div class="row">
                              <div class="col">
                              $item->price
                              </div>
                              <div class="col">
                              $item->quantity
                              </div>
                              
                            </div>
                            </li>
                          </ul>
                        </div>   
                  </a>
                </div>
             

              @else

                <div class="col-3">
                  
                  <a href="" class='text-decoration-none'>
                      <div class="card h-100">
                        <img src="https://www.importadoraespinoza.com/Dinamic/Assets/img/no_image.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-title">{{$item['name']}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                          <div class="row">
                            <div class="col">
                            {{$item['price']}}
                            </div>
                            <div class="col">
                            {{$item['quantity']}}
                            </div>
                            
                          </div>
                          </li>
                        </ul>
                      </div>
                    
                  </a>
                </div>
                
              @endif
              
            @endforeach 
          @endforeach  
          
        </div>
      </div>



      <div class="col-md-4 DatosVenta p-2 m-0">
        <div class='DatosVenta_lista p-3'>
          @php
            $i=0;
          @endphp
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
                @foreach ($carrito as $indice => $item2)
                  @php
                    $i+=1;
                  @endphp
                <tr>
                  <th scope="row">
                    {{ $i }}
                  </th>
                  <td>{{ $item2->name }}</td>
                  <td>{{ $item2->price }}</td>
                  <td>@mdo</td>
                  <td>Total</td>
                  <td>
                    <a href="{{ route('admin.quitarProductoVenta', $indice) }}"
                      class='text-decoration-none text-light'>
                      <button type="button" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3 "></i>
                      </button>   
                    </a>
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>

        <div class='mt-2'>
          <div class='monto'>
            <div>Subtotal</div>
            <div>Total</div>
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
      margin-right:10rem;
      display:flex;
      flex-direction:column;
      align-items: flex-end;
      
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

