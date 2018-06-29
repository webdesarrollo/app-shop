@extends('layouts.admin')
@section('title','admin - categorias')
@section('contenido')
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Categorias<a href="{{URL('admin/categorias/create')}}" data-toggle="tooltip" data-placement="top" title="Nueva categoria" class="btn btn-success float-right">Nueva <i class="mdi mdi-plus"></i></a></h4>
                <br>
                <div class="table-responsive">
                    <table class="table ">
                    <thead class="thead-dark">
                        <tr class="">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Operacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $key=> $categoria)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td class="table-primary">
                                    {{$categoria->nombre}}
                                </td>
                                <td>
                                    {{$categoria->descripcion}}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href="{{URL::action('admin\CategoriaController@edit',$categoria->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar">
                                          <i class="mdi mdi-square-edit-outline"></i>
                                      </a>

                                    {!!Form::open(['route'=>['categorias.destroy',
                                        $categoria->id],'method'=>'DELETE'])!!}
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
                {{$categorias->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
