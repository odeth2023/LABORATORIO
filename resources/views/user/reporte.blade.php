<!DOCTYPE html>
<html lang="en">

<head>
    <title>COMPROBANTE</title>
 
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <style>
        img{
          width: 300px;
          height: 80px;
          margin-left: 33%;
          padding: 15px;
        }

        .mini{
          width:50px;
          height:50px;

        }


        .logo{
            border-bottom: 3px solid rgba(0,0,0,.25);
        }
        p{
            border-collapse:collapse;
            width: 100%; 
            margin-right: 50%;
            font: 800 40px/1.05 Montserrat,sans-serif;
        }
        .titu{
            border-collapse:collapse;
            width: 20%; 
            margin: auto;
            font-size: 25px;
        }
        .titu2{
            padding: 15px;
            font: 800 30px/1.05 Montserrat,sans-serif;
            color: rgb(0, 0, 0);
        }
        .titu .titu2{
          border-bottom: 3px solid rgba(0,0,0,.25);
        }
        body{
            margin: auto;
            width: 700px;
        }
        .cliente{
         height: 150px;
        }
        tr, td{
          font: 800 20px/1.05 Montserrat,sans-serif;
          width: 10%;
        }
      </style>
</head>
<body>
<div class="logo">
   <!--<img src="img/logo.png" alt="">-->
</div>

<center>
  <p>LA NOCHE DEL DEMONIO: LA PUERTA ROJA</p>
</center>
    
  
<div class="cliente">
  <!--<img src="img/cliente.png" alt="">-->
</div>

  <table class="titu">

  <tr>
    <td class="titu2">CLIENTE:</td>
    <td class="titu2">{{$item->name}}</td>
  </tr>
  </table>


   <table>
    <tr>
      <td>
        <!--<img class='mini' src="img/fecha.png" alt="">-->
        17/07/2023
      </td>
      <td>

      </td>
      <td>
        <!--<img class='mini' src="img/hora.png" alt="">-->
        18:00 pm.
      </td>
      <td>

      </td>
      <td>
        <!--<img class='mini' src="img/sala.png" alt="">-->
        Sala:02
      </td>
    </tr>
   </table>

   <h3><!--<img src="img/butacas.png" alt="">Tus butacas--></h3>
   <h3><!--img src="img/entradas.png" alt="">Entradas--></h3>
   <h3><!--<img src="img/dulceria.png" alt="">Dulcería--></h3>


</body>
</html>