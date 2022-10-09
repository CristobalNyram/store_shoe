@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a  href="{{ route('brand.index') }}" type="button" class="btn btn-warning mb-3 text-white" >Regresar</a>

            <div class="card">
                <div class="card-header">Editar Marca</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form
                        action="{{ route('brand.update',$brand) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label>Título *</label>
                            <input type="title" name="title" value="{{ $brand->title }}" class="form-control" required>

                        </div>
                        {{-- <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="file">
                        </div> --}}
                        <div class="form-group mt-2">
                            <label>Descripción *</label>
                            <input type="description" name="title" value="{{ $brand->description }}" class="form-control" required>


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
