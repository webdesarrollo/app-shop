@extends('layouts.admin')
@section('title','App Shop - admin')
@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dashboard</h4>

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
                    </div><!--NAV-TABS-->
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="thead-dark">
                                <tr class="">
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($detalles as $d)
                                    <tr>
                                        <td>
                                            <img src="{{$d->imagen}}" alt="">
                                        </td>
                                        <td>
                                            <a href="{{URL::action('FrontController@show',$d->id)}}" >
                                                {{$d->producto}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$d->cantidad}}
                                        </td>
                                        <td>
                                            $ {{$d->precio}}
                                        </td>
                                        <td>
                                            $ {{$d->precio*$d->cantidad}}
                                        </td>
                                        <td>
                                            {!!Form::open(['route'=>['cart.destroy',
                                                $d->cart_detalle],'method'=>'DELETE'])!!}
                                                   <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="mdi mdi-delete"></i></button>
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @if ($detalles->count()>0)
                        {!! Form::open(['action' => 'CartController@update', 'method' => 'POST'])!!}
                          <button class="btn btn-primary" type="submit">Realizar pedido</button>
                        {!! Form::close() !!}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
