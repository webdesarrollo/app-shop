@extends('layouts.admin')
@section('title','admin - productos')
@section('contenido')
@section('estilo')
  <style>
  .tt-query {
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
       -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  }

  .tt-hint {
    color: #999
  }

  .tt-menu {    /* used to be tt-dropdown-menu in older versions */
    width: 222px;
    margin-top: 4px;
    padding: 4px 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
            border-radius: 4px;
    -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
  }

  .tt-suggestion {
    padding: 3px 20px;
    line-height: 24px;
  }

  .tt-suggestion.tt-cursor,.tt-suggestion:hover {
    color: #fff;
    background-color: #0097cf;

  }

  .tt-suggestion p {
    margin: 0;
  }
  </style>
@endsection
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Productos<a href="{{URL('admin/productos/create')}}" data-toggle="tooltip" data-placement="top" title="Nuevo producto" class="btn btn-success float-right">Nuevo <i class="mdi mdi-plus"></i></a></h4>
                @include('admin.productos.buscar')
                <br>
                <div class="table-responsive">
                    <table class="table ">
                    <thead class="thead-dark">
                        <tr class="">
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td class="table-primary">
                                    {{link_to_action('FrontController@show', $title = $producto->nombre, $parameters = [$producto->id], $attributes = [])}}
                                </td>
                                <td>
                                    {{$producto->descripcion}}
                                </td>
                                <td>
                                    {{$producto->precio}}
                                </td>
                                <td>
                                    {{$producto->category ? $producto->category->nombre: 'General'}}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{URL::action('admin\ProductController@edit',$producto->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>
                                    <a href="{{URL::action('admin\ImageController@show',$producto->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Imagenes">
                                        <i class="mdi mdi-image"></i>
                                    </a>
                                    {!!Form::open(['route'=>['productos.destroy',
                                        $producto->id],'method'=>'DELETE'])!!}
                                           <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="mdi mdi-delete"></i></button>
                                    {!!Form::close()!!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                {{$productos->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('sripts')
  <script src="{{ asset('js/bloodhound.min.js') }}"></script>
  <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
  <script>
  $(function(){

    var productos = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `states` is an array of state names defined in "The Basics"

      prefetch: '{{URL('admin/productos/json')}}'
    });

    $('#search').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'productos',
      source: productos
    });
  })
  </script>
@endsection
