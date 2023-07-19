@extends('layouts.MasterpageCliente')

@section('content')

<div class='text-light'>COMPRAS</div>

<div class='lista-compras-cliente text-light'>
<table class="table text-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Primero</th>
      <th scope="col">Último</th>
      <th scope="col">Handle</th>
      <th scope="col">Boleta</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reporte as $item)   
    <tr>
      <th scope="row">1</th>
      <td>{{ $item->id}}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email}}</td>
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

