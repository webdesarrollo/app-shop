@extends('layouts.app')
@section('title','App Shop - producto')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Producto <span class="text-info">{{$producto->nombre}}</span></h4>
                <hr>
                <br>
                
                @if (session('notificacion'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong class="text-wite">
                         {{session('notificacion')}}!
                      </strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                @endif

                <h6>{{$producto->category->nombre}}</h6>
                <p>{{$producto->descripcion}}</p>
                <p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCart">
                  <i class="mdi mdi-cart"></i>Add
                </button>
                </p>

                @foreach($imagenes as $img)
                    <img src="{{$img->nombre}}" alt="" width="200">
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('producto.modal')
@endsection
