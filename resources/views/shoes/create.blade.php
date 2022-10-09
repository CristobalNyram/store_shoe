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
                            <input type="title" name="title" class="form-control" required>
                            <input type="hidden" value="2" class="form-control" required>

                        </div>
                        {{-- <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="file">
                        </div> --}}
                        <div class="form-group mt-2">
                            <label>Descripción *</label>
                            <textarea name="description" rows="6" class="form-control" required></textarea>
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