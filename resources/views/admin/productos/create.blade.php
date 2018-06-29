@extends('layouts.admin')
@section('title','admin - crear producto')
@section('contenido')
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Registrar nuevo producto</h4>
                <br>
                <!--Formulario-->
                {!!Form::open(['route' => 'productos.store', 'method' => 'POST'])!!}
                    <div class = "form-group">
                          {!!Form::label('Nombre: ')!!}
                          {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre...','required','value'=>"{{old('nombre')}}"])!!}
                    </div>
                    <div class = "form-group">
                            {!!Form::label('Precio: ')!!}
                            {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Precio...','required','value'=>"{{old('precio')}}"])!!}
                    </div>
                    <div class = "form-group">
                      <select name="category_id" class="custom-select" name="category_id">
                          <option value="0">General</option>
                          @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class = "form-group">
                          {!!Form::label('Descripcion: ')!!}
                          {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion...','required','value'=>"{{old('descripcion')}}"])!!}
                    </div>
                    <div class = "form-group">
                          {!!Form::label('Descripcion extensa: ')!!}
                          {!!Form::textarea('descripcion_larga',null,['class'=>'form-control','placeholder'=>'Decripcion extensa...','value'=>"{{old('descripcion_larga')}}"])!!}
                    </div>
                    <div class = "form-group">
                        <a href="{!!URL::to('admin/productos/')!!}" class="btn btn-danger">Cancelar</a>
                       {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
                    </div>
                {!!Form::close()!!}

            </div>
        </div>
    </div>
</div>
@endsection
