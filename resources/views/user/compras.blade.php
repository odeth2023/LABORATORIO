@extends('layouts.MasterpageCliente')

@section('content')

<style>

            

      

      .my-account--wrapper, th {

          color: #ffffff;

          margin: 0 auto;

          max-width: 1090px;

          padding: 30px 1em 0 2em;

          position: relative;

          font-size: 22px;

      }

      

      .my-account--wrapper, td {

      

          color: #ffffff;

          font-size: 18px;

      }

      

      .my-account--history {

        border-top: 3px solid #f90000;

        border-bottom: 3px solid #f90000;

        padding: 0px 2px;

      }

      

      .app {

          font: 16px/1.5 Lato,sans-serif;

          margin: 0 auto;

          max-width: 100%;

          overflow: hidden;

      }

      

      .my-account--history--table {

          border-collapse: collapse;

          border-spacing: 10px;

          margin: 25px auto 0 30px;

          text-align: left;

      }

      

      .my-account--history--table td, .my-account--history--table th {

          padding: 0 20px;

      }

      

      button, input, optgroup, select, textarea {

          margin: 0;

          font: 20px/1.5 Lato,sans-serif;

          line-height: inherit;

          background-color: #ffffff;

      }

      

      .my-account--history--load-more-wrapper {

          display: table;

          margin: 0 auto;

          padding-top: 30px;

      }

      

      element.style {

          background-image: url(https://www.crushpixel.com/big-static19/preview4/online-cinema-vector-banner-with-3734928.jpg);

      }

      

      .slide {

          background-color: #d6d7da;

          background-position: 50%;

          background-repeat: no-repeat;

          background-size: cover;

          display: block;

          height: 550px;

          margin: 0 auto;

          overflow: hidden;

          position: relative;

      }

      

      .slide--content-wrapper {

          -webkit-box-align: end;

          -ms-flex-align: end;

          align-items: flex-end;

          bottom: 0;

          display: -webkit-box;

          display: -ms-flexbox;

          display: flex;

          left: 50%;

          max-width: 1070px;

          overflow: hidden;

          padding: 0 50px 100px;

          position: absolute;

          top: 0;

          -webkit-transform: translateX(-50%);

          transform: translateX(-50%);

          width: 100%;

      }

      

      .slide--content {

          color: #fff;

          max-width: 500px;

          text-align: left;

      }

      

      .slide_compact .content--title, .slide_slim .content--title {

          font-size: 50px;

          line-height: 50px;

      }

      

      .slide--content .content--title {

          font-family: Montserrat,sans-serif;

          font-size: 44px;

          font-weight: 800;

          line-height: 64px;

          position: relatie;

          z-index: 2;

      }

      

      .slide--content .content--details {

          font-size: 18px;

          line-height: 24px;

          margin: 32px 0;

          position: relative;

      }

      

      .hero-header {

          background-color: #f6f6f6;

      }

</style>

<div class="hero-header">

         <div class="hero-header--waypoint-content">

            <div class="slide candy-store-landing--promotion-image slide_left-aligned slide_compact" style="background-image: url(&quot;https://cdn.cineplanet.com.pe/contentAsset/raw-data/91afdd19-15f7-40bd-b640-64adfeb5eb01&quot;);">

                    <div class="slide--content-wrapper">

                        <div class="slide--content">

                            <div class="content--title">¡Vale la pena ser Gold!</div>

                            <div class="content--details">Adquiere tus entradas en preventa</div>

                            <div class="content--call-to-action-container"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

 

    <!--fin de banner-->

    <!--INTERFAZ-->

    <div class="my-account--wrapper">

        <div class="my-account--tab my-account--profile">

            <div class="my-account--profile--top">

                <div class="my-account--tab my-account--profile">

                    <!-- react-empty: 28 -->

                    <div class="my-account--profile--bottom">

                        <div class="my-account--column">

                            <div class="my-account--history">

                                <div>

                                    <table class="my-account--history--table">

                                        <thead>

                                            <tr>

                                                <th>Detalle</th>

                                                <th>Cliente</th>

                                                <th>e-mail</th>

                                                <th>Compra</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        @foreach($reportes as $item)

                                            <tr>

                                                <td>

                                                    <span class="icon cineplanet-icon cineplanet-icon_tickets cineplanet-icon_23 " role="presentation" style="position: relative; font-size: 23px;">

                                                    </span><!-- react-text: 229 --> <!-- /react-text --><!-- react-text: 230 -->Ant-Man and The Wasp Quantumania<!-- /react-text -->

                                                </td>

                                                    <td>{{ $item->name }}</td>

                                                    <td>{{ $item->email}}</td>

                                                    <td>

                                                        <button id="button-ui-1" type="button" class="button call-to-action call-to-action_rounded-transparent

                                                        call-to-action_blue-transparent call-to-action_medium call-to-action_fullsize">

                                                        <span href="{{route('reporte.home', $item)}}" class="call-to-action--text" >

                                                          DESCARGAR

                                                        </span>

                                                    </button>

                                                </td>

                                            </tr>

                                            @endforeach

                                        </tbody>

                                    </table>

                                    <div class="my-account--history--load-more-wrapper"></div>

                                </div>

                            </div>

                            <a id="link_download" href="data:application/octet-stream;base64,null" download="COMPROBANTE.pdf" target="_blank" style="visibility: hidden;"></a>

                        </div>

                    </div>

                </div>

            </div>


@endsection

