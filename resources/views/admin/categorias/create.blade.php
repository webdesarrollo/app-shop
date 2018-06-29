@extends('layouts.admin')
@section('title','admin - crear producto')
@section('contenido')
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Registrar nueva categoria</h4>
                <br>
                @if($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <ul>
                        @foreach ($errors as $error)
                          <li><strong>{{$error}}</strong></li>
                        @endforeach
                      </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <!--Formulario-->
                {!!Form::open(['route' => 'categorias.store', 'method' => 'POST'])!!}
                    <div class = "form-group">
                          {!!Form::label('Nombre: ')!!}
                          {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre...','required','value'=>"{{old('nombre')}}"])!!}
                    </div>
                    <div class = "form-group">
                            {!!Form::label('Descripcion: ')!!}
                            {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion...','value'=>"{{old('descripcion')}}"])!!}
                    </div>

                    <div class = "form-group">
                        <a href="{!!URL::to('admin/categorias/')!!}" class="btn btn-danger">Cancelar</a>
                       {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
                    </div>
                {!!Form::close()!!}

            </div>
        </div>
    </div>
</div>
@endsection
