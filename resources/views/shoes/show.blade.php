@extends('layouts.app')

@section('content')
@php
$route_image_shoes ='storage/';
@endphp
<div class="container">
    <a  href="{{ route('catalog.index') }}" type="button" class="btn btn-warning mb-3 text-white" >Regresar</a>

    <div class="card mb-3">




        @empty($shoe->image_url)
        <div class="m-5">
            <span class="text-danger">No hay ninguna imagen</span>

        </div>
        @else
        <img src="{{  url($route_image_shoes.$shoe->image_url) }}" class="card-img-top" alt="...">

        @endempty
        <div class="card-body">
          <h5 class="card-title">{{ $shoe->title }}</h5>
          <p class="card-text"><span class="fw-bold">Descripción</span>  {{  $shoe->description }}</p>

          <p class="card-text"><span class="fw-bold">Modelo</span>  {{  $shoe->description }}</p>
          <p class="card-text"><span class="fw-bold">Marca</span>  {{  $shoe->description }}</p>
          <p class="card-text"><span class="fw-bold">Categoria</span>  {{  $shoe->description }}</p>


          <p class="card-text"><small class="text-muted">Precio: ${{  $shoe->price  }}</small></p>
          <p class="card-text"><small class="text-muted">Stock:  {{  $shoe->stock  }}</small></p>


        </div>
      </div>

</div>
@endsection
