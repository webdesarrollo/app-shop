@extends('layouts.app')
@section('title','App Shop - Bienvenido')
@section('content')
<br>
<section class="jumbotron text-center bg-white">
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
</section>
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{$producto->images()->first()->imagen}}" alt="{{$producto->nombre}}" data-holder-rendered="true">
            <div class="card-body">
              <h6>{{$producto->nombre}}</h6>
              <hr>
              <p>{{$producto->category->nombre}}</p>
              <p class="card-text">{{$producto->descripcion}}</p>
              <p><span class="btn btn-success">$ {{$producto->precio}}</span></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  {!!link_to_action('FrontController@show', $title = 'Ver', $parameters = [$producto->id], $attributes = ['class'=>'btn btn-sm btn-outline-secondary']);!!}
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{$producto->created_at}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>
<div class="row">
  <div class="col">
    <h1>Aún no te has registrado?</h1>
    {!! Form::open(['route'=>'register','method' => 'get', 'class' => 'form-inline']) !!}
      <div class="form-group">
        {!!Form::label('Nombre: ')!!}
        {!!Form::text('name',null,['class'=>'form-	control','required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('E-mail') !!}
        {!!Form::email('email',null,['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::submit('Enviar', ['class'=>'btn btn-primary btn-block']) !!}
      </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
