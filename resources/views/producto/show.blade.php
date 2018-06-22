@extends('layouts.app')
@section('title','App Shop - producto')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow-sm ">
            <div class="card-body">
                <h4 class="card-title">Producto <span class="text-info">{{$producto->nombre}}</span></h4>
                <hr>
                <br>
                <h6>{{$producto->category->nombre}}</h6>
                <p>{{$producto->descripcion}}</p>
                @foreach($imagenes as $img)
                    <img src="{{$img->nombre}}" alt="">
                @endforeach
            </div>    
        </div>
    </div>
</div>

@endsection
