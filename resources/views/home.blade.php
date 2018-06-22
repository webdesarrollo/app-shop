@extends('layouts.admin')
@section('title','App Shop - admin')
@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dashboard</h4>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="carrito-tab" data-toggle="tab" href="#carrito" role="tab" aria-controls="carrito" aria-selected="true">Carrito de compras</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pedidos-tab" data-toggle="tab" href="#pedidos" role="tab" aria-controls="pedidos" aria-selected="false">pedidos realizados</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="carrito" role="tabpanel" aria-labelledby="carrito-tab">Carrito</div>
                      <div class="tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">Mis pedidos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
