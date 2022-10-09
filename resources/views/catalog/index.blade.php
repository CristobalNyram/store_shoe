@extends('layouts.app')

@section('content')
@php
$route_image_shoes ='storage/';
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Categorias') }}

                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($categories as  $category)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="" class="card-link">
                                {{ $category->title }}
                                </a>
                            </li>

                          </ul>
                        @endforeach

                      </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Modelos') }}
                </div>

                <div class="card-body">
                    @foreach ($models as  $model)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="" class="card-link">
                            {{ $model->title }}
                            </a>
                        </li>

                      </ul>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Marca') }}
                </div>

                <div class="card-body">
                    @foreach ($brands as  $brand)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="" class="card-link">
                            {{ $brand->title }}
                            </a>
                        </li>

                      </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Todos los productos') }}
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

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
