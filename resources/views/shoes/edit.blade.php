@extends('layouts.app')

@section('content')
@php
                   $route_image_shoes ='storage/';
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a  href="{{ route('shoes.index') }}" type="button" class="btn btn-warning mb-3 text-white" >Regresar</a>

            <div class="card">
                <div class="card-header">Editar Zapato</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())

                            @foreach ($errors->all() as $error)


                            <div class="alert alert-danger" role="alert">
                                                                {{ $error }}
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @endforeach
                    @endif
                    <form
                        action="{{ route('shoes.update',$shoe) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label>Nombre *</label>
                            <input type="title" name="title" value="{{ $shoe->title }}" class="form-control" required>

                        </div>
                        @empty ($shoe->image_url)
                        <div class="form-group row">
                            <label class="text-warning">No tiene imagen este producto</label>

                        </div>

                        @else
                        <div class="form-group row">
                            <img src="{{  url($route_image_shoes.$shoe->image_url) }}" class="img-fluid" alt="imagen">

                        </div>
                        @endempty
                        <div class="form-group row">
                            <label>Actualizar</label>
                            <input type="file" name="image_url" accept="image/gif, image/jpeg, image/png" >
                        </div>
                        <div class="form-group mt-2">
                            <label>Descripción *</label>
                            <textarea name="description" rows="6" value="{{ $shoe->description }}" class="form-control" required>{{ $shoe->description }}</textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label>Precio ($) *</label>
                            <input type="number" name="price"  value="{{ $shoe->price }}" class="form-control" required>

                        </div>
                        <div class="form-group mt-2">
                            <label>Stock (cantidad en inventario) *</label>
                            <input type="number" name="stock" value="{{ $shoe->stock }}" class="form-control" required>

                        </div>


                        <div class="form-group mt-2">
                            <label>Categoria *</label>
                            <div class="form-group">
                                <select class="form-control" id="category_id" name="category_id">
                                    <option  value="-1" @if($shoe->category_id=='' )selected @else @endif >Seleccionar</option>




                                    @foreach ($categories as $category)
                                    @if ($shoe->category_id==$category->id)
                                    <option  selected value="{{ $category->id }}">{{ $category->title }}</option>

                                    @else
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>

                                    @endif

                                    @endforeach

                                </select>
                              </div>
                        </div>

                        <div class="form-group mt-2">
                            <label>Modelo *</label>
                            <div class="form-group">
                                <select class="form-control" id="model_id" name="model_id">


                                    <option  value="-1" @if($shoe->brand_id=='' )selected @else @endif >Seleccionar</option>

                                    @foreach ($models as $model)
                                    @if ($shoe->model_id==$model->id)
                                    <option  selected value="{{ $model->id }}">{{ $model->title }}</option>

                                    @else
                                    <option value="{{ $model->id }}">{{ $model->title }}</option>

                                    @endif

                                    @endforeach
                                </select>
                              </div>

                        </div>

                        <div class="form-group mt-2">
                            <label>Marca *</label>
                            <div class="form-group">
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <option  value="-1" @if($shoe->brand_id=='' )selected @else @endif >Seleccionar</option>

                                    @foreach ($brands as $brand)
                                    @if ($shoe->brand_id==$brand->id)
                                    <option  selected value="{{ $brand->id }}">{{ $brand->title }}</option>

                                    @else
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>

                                    @endif

                                    @endforeach
                                </select>
                              </div>

                        </div>

                        <div class="form-group mt-3">
                            @method('PUT')
                            @csrf
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
