@extends('layouts.admin')
@section('title','admin - editar categoria')
@section('contenido')
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Editar categoria <span class="text-info">{{$categoria->nombre}}</span></h4>
                <br>
                <!--Formulario-->
                {!!Form::model($categoria,['route'=>['categorias.update', $categoria->id],'method'=>'PUT'])!!}
                    <div class = "form-group">
                          {!!Form::label('Nombre: ')!!}
                          {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre...','required','value'=>"{{old('nombre')}}"])!!}
                    </div>

                    <div class = "form-group">
                          {!!Form::label('Descripcion: ')!!}
                          {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Decripcion extensa...','value'=>"{{old('descripcion')}}"])!!}
                    </div>
                    <div class = "form-group">
                        <a href="{!!URL::to('admin/categorias/')!!}" class="btn btn-danger">Cancelar</a>
                       {!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
                    </div>
                {!!Form::close()!!}

            </div>
        </div>
    </div>
</div>
@endsection
