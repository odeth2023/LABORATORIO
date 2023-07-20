<!DOCTYPE html>
<html lang="en">

<head>
    <title>COMPROBANTE</title>
 
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <style>
        html{
          font-size:62%;
        }
        
        .Pelicula-titulo{
          font-size:2.5rem;
          text-align:center;
        }

        .Seccion1{
          width:100%;
          

        }

        .Seccion1-cliente{
          width: 200px;
          min-height: 150px;
          margin-left: 33%;
          padding: 10%;
        }

        .table td{
          padding: 0 20px ; 
          
        }

        element.style {
          width:40rem; 
          
        }
        
        .categories__slider .col-lg-3 {
          max-width: 100%; 
        }

        element.style {
          background-image: url(img/logo.png);
        }
         
        .owl-item{
          border-bottom:1px solid #999797;
        }

        .categories__item {
          height: 240px;
          /*position: relative;
          width:900px;*/
        }

        .set-bg {
          background-repeat: no-repeat;
          
        }

        p{
            font: 800 40px/1.05 Montserrat,sans-serif;
        }

        .titu2{
            font: 800 30px/1.05 Montserrat,sans-serif;
            color: rgb(0, 0, 0);
        
        }

        /*body{
            margin: auto;
            width: 1000px;
        }*/

        

        tr, td{
          font: 800 30px/1.05 Montserrat,sans-serif;
          width: 10%;
        }
        
        h3{
          font: 800 30px/1.05 Montserrat,sans-serif;
          width: 10%;
        }

        tr, td, img{
          width: 200px;  
          margin-left: -15%;
          padding: 0% 15px;
        }

        .footer{
          display: flex;
          align-items: center;
          flex-direction: column;
          padding: 20px 50px;
        }
        
        .footer > div{
          width: 100%;
        }
        
        .total2> h3{
          width: 900px;
          text-align: right;
          padding: .5em;
        }
        
        h4{
          font:  Montserrat,sans-serif;
          color: rgb(0, 0, 0);
        }



      </style>
</head>
<body>
  <div class='container'>

  
  <div class="owl-item" ><div class="col-lg-3">
    <div class="categories__item set-bg" data-setbg="img/logo.png" style="background-image: url(&quot;assetsCustomer/images/Boleta/logo.png&quot;);">
    </div>
    </div>
  </div>
  


  @foreach($reportes as $item)
  <p class='Pelicula-titulo'>{{ $item->movieName}}</p>
  @endforeach      
    
<div class='Seccion1'>
  <div class="Seccion1-cliente">
    <img src="assetsCustomer/images/Boleta/cliente.png" alt="">
  </div>

  <div style="Seccion1-nombre text-align: center;">
    <table class="titu" >
    <tr>
      <td></td>
      @foreach($reportes as $item)
      <td class="titu2">CLIENTE:</td>
      <td class="titu2">{{ $item->name}} </td>  
      @endforeach
    </tr>
    </table>
  </div>
</div> 

  
  <hr style="border-color:solid #999797;">
   <table>
   @foreach($reportes as $item)
    <tr>
      <td>
        <img src="assetsCustomer/images/Boleta/fecha.png" alt="">
        <h4>{{ $item->schedule}}</h4>
      </td>
      <td>

      </td>
      <td>

      </td>
      <td>
        <img src="assetsCustomer/images/Boleta/hora.png" alt="">
        <h4>18:00 pm.</h4>
      </td>
      <td>

      </td>
      <td>

      </td>
      <td>
        <img src="assetsCustomer/images/Boleta/sala.png" alt="">
        <h4>{{ $item->roomNumber}}</h4>
      </td>
    </tr>
    @endforeach
   </table>
  

   <hr style="border-color:solid #999797;">
   
  <table>
    <tr>
    <td>
      <img src="assetsCustomer/images/Boleta/butacas.png" alt="">
    </td>
    <td>
      <h3>Tus butacas:</h3>
    </td>
    <td>
     <h4>G15, G16</h4>
    </td>
    </tr>
  </table>

  <hr style="border-color:solid #999797;">  
  <table>
  <tr> 
   <td>
    <img src="assetsCustomer/images/Boleta/entradas.png" alt="">
   </td>
    <td>
    <h3>Entradas</h3>
   </td> 
   <td>
    <h4>Cant: 2</h4>
  </td>
  <td>
    <h4>s/.40.00</h4>
  </td>  
  </tr>
  </table> 

  <hr style="border-color:solid #999797;">

<table>
  <tr>
    <td>
    <img src="assetsCustomer/images/Boleta/dulceria.png" alt="">
    </td>
   <td>
    <h3>
      Dulcería
    </h3> 
      <h4>Combo 2 Salado OL CC</h4>
    
   </td>
    <td>
      <h4>Cant:1</h4>
    </td>
    <td>
      <h4>s/34.00</h4>
    </td>
  </tr>
</table> 


<hr style="border-color:solid #999797;"> 

 <div class="footer"> 
  <div class="total2">
   <h3>TOTAL: S/74.00</h3>
  </div> 
</div> 

<p style="width: 100%;">*********GRACIAS POR SU COMPRA*********</p>

</div>
</body>
</html>