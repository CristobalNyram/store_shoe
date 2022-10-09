@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a  href="{{ route('shoes.index') }}" type="button" class="btn btn-warning mb-3 text-white" >Regresar</a>

            <div class="card">
                <div class="card-header">Crear Marca</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form
                        action="{{ route('shoes.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label>Título *</label>
                            <input type="text" name="title" class="form-control" required>

                        </div>
                        <div class="form-group row">
                            <label>Imagen</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group mt-2">
                            <label>Descripción *</label>
                            <textarea name="description" rows="6" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label>Precio ($) *</label>
                            <input type="number" name="price" class="form-control" required>

                        </div>
                        <div class="form-group mt-2">
                            <label>Stock (cantidad en inventario) *</label>
                            <input type="number" name="stock" class="form-control" required>

                        </div>


                        <div class="form-group mt-2">
                            <label>Categoria *</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                        </div>

                        <div class="form-group mt-2">
                            <label>Modelo *</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>

                        </div>

                        <div class="form-group mt-2">
                            <label>Marca *</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>

                        </div>

                        <div class="form-group mt-3">
                            @csrf
                            <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
