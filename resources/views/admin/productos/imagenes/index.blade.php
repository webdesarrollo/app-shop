@extends('layouts.admin')
@section('title','admin - productos imagenes')
@section('contenido')
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Imagnes del producto <span class="text-info">{{$producto->nombre}}</span></h4>
                
                <div class="row">
                    <div class="col">
                    {!!Form::open(['route' => 'imagenes.store', 'method' => 'POST','files' => true])!!}
                        <div class="form-group">
                            {!! Form::file('imagen',['class'=>'form-control-file','required']) !!}
                        </div>
                        <input type="hidden" value="{{$producto->id}}" name="id">
                        <button data-toggle="tooltip" data-placement="top" title="Nueva imagen" class="btn btn-success" type="submit">
                            Subir imagen <i class="mdi mdi-plus"></i>
                        </button>
                    {!!Form::close()!!}
                    </div>
                </div>
       
                <br>
                <div class="row">
                @foreach($imagenes as $imagen)
                    <div class="col-xs-12 col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <img src="{{$imagen->imagen}}" alt="{{$producto->nombre}}">
                            </div>
                            <div class="panel-footer text-center">
                                {!!Form::open(['route'=>['imagenes.destroy',
                                        $imagen->id],'method'=>'DELETE'])!!}
                                           <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="mdi mdi-delete"></i></button>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{URL('admin/productos/')}}" class="btn btn-danger"><i class="mdi mdi-arrow-left"></i>Volver</a>
            </div>
        </div>
    </div>
</div>        
@endsection