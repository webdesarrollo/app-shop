@extends('layouts.admin')
@section('title','admin - productos')
@section('contenido')
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Productos<a href="{{URL('admin/productos/create')}}" data-toggle="tooltip" data-placement="top" title="Nuevo producto" class="btn btn-success float-right">Nuevo <i class="mdi mdi-plus"></i></a></h4>
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
                                    {{$producto->nombre}}
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
                                    <a href="{{URL::action('ProductController@edit',$producto->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>  
                                    <a href="{{URL::action('ImageController@show',$producto->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Imagenes">
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