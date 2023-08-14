@extends('layouts.MasterpageCliente')

@section('content')

<div class='text-light'>COMPRAS</div>

<div class='lista-compras-cliente text-light'>
<table class="table text-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">N° Boleta</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Película</th>
      <th scope="col">Sala</th>
      <th scope="col">Asiento</th>
      <th scope="col">Horario</th>
      <th scope="col">Estado</th>
      <th scope="col">Total</th>
      <th scope="col">Boleta</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reportes as $item)   
    <tr>
      <th scope="row">1</th>
      <td>{{ $item->NVoucher}}</td>
      <td>{{ $item->name}}</td>
      <td>{{ $item->lastname}}</td>
      <td>{{ $item->movieName}}</td>
      <td>{{ $item->roomNumber}}</td>
      <td>{{ $item->seatNumber}}</td>
      <td>{{ $item->schedule}}</td>--
      <td>{{ $item->state}}</td>
      <td>{{ $item->total}}</td>
      <td>
        <a href="{{route('reporte.home', $item)}}" class="btn btn-primary" type="submit">
            <i class="fa-solid fa-plus"></i> Descargar
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@endsection

