<!DOCTYPE html>
<html lang="en">

<head>
    <title>COMPROBANTE</title>
 
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <style>
        * {
            font-size: 12px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            /*border-collapse: collapse;*/
            margin: 0 auto;
        }

        td.precio {
            text-align: right;
            font-size: 11px;
        }

        td.cantidad {
            font-size: 11px;
        }

        td.producto {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width:180px;
            max-width: 180px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        /*.ticket {
            margin: 0;
            padding: 0;
        }*/

        body {
            text-align: center;
        }
    </style>
</head>
<body>
 
<p>Tiket de Venta</p>

<div class="ticket centrado">
        <h1>CINEMOVIE</h1>
        @foreach($reportes as $item)
        <h2>Ticket de venta #{{$item->idSale}}</h2>
        <h2>{{ $item->DateSale}} {{ $item->HourSale}}</h2>
        @endforeach   

        <table>
            <thead>
                <tr class="centrado">
                    <th class="producto">PRODUCTO</th>
                    <th class="cantidad">CANT</th>
                    <th class="precio">$$</th>
                </tr>
            </thead>
            <tbody>
                
              @foreach($reportes2 as $item2)
                    <tr>
                      <td class="producto">{{$item2->name}}</td>
                      <td class="cantidad">{{$item2->quantity}}</td>
                      <td class="precio">{{$item2->price}}</td>
                    </tr>
              @endforeach   
                
            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</strong>
                </td>
                @foreach($reportes as $item)
                <td class="precio">
                {{ $item->total}}
                </td>
                @endforeach 
            </tr>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
          
    </div>
  
</body>
</html>