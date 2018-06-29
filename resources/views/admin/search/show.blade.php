@extends('layouts.app')
@section('title','App Shop - producto')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buscqueda</h4>
                <hr>
                <br>
                <p>se encontraron {{$productos->count()}} productos para {{$query}}</p>
                <p>
                @foreach ($productos as $producto)
                  <ul>
                    <li>{{$producto->nombre}}</li>
                    <li>{{$producto->descripcion}}</li>
                    <li></li>
                  </ul>
                @endforeach
                <a href="{!!URL::to('/admin/productos')!!}" class="btn btn-danger">volver</a>
            </div>
        </div>
    </div>
</div>
@include('producto.modal')
@endsection
