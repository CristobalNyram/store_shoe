

@extends('layouts.app')

@section('content')
@php
$route_image_shoes ='storage/';
@endphp
<div class="container">
    <a  href="{{ route('catalog.index') }}" type="button" class="btn btn-warning mb-3 text-white" >Regresar</a>

    <div class="row justify-content-center">

  <div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">{{ __('Todos los productos de la categoria') }} {{ $current_category->title }}
            </div>

            <div class="card-body row">
                @foreach ($shoes as $shoe )
                <div class="card m-1" style="width: 18rem;">
                    @empty($shoe->image_url)
                    <div class="row m-5">
                        <span class="text-danger">No hay ninguna imagen</span>

                    </div>
                    @else
                    <img src="{{  url($route_image_shoes.$shoe->image_url) }}" class="card-img-top" alt="...">

                    @endempty
                    <div class="card-body">
                    <h5 class="card-title">{{ $shoe->title }}</h5>
                    <p class="card-text">{{ $shoe->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Precio: $ {{ $shoe->price }} </li>
                    <li class="list-group-item">Existentes: {{ $shoe->stock }}  </li>
                    </ul>
                    <div class="card-body">
                    <a href="{{  route('shoes.show',$shoe) }}" class="card-link">Más informacion</a>
                    </div>
                </div>
                @endforeach

                @if($shoes->isEmpty())
                    <h5 class="text-danger">No hay productos en esta categoria</h5>
                @endif

            </div>
        </div>
    </div>

</div>
    </div>
</div>
@endsection




