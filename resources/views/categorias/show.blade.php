@extends('layouts.app')
@section('title','App Shop - categoraias')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Categorias <span class="text-info">{{$categoria->nombre}}</span></h4>
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

                <p>{{$categoria->descripcion}}</p>
                <p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCart">
                  <i class="mdi mdi-cart"></i>Add
                </button>
                </p>
                  {{$categoria->getImagen()}}

            </div>
        </div>
    </div>
</div>
@endsection
