@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a  href="{{ route('category.index') }}" type="button" class="btn btn-warning mb-3 text-white" >Regresar</a>

            <div class="card">
                <div class="card-header">Crear Categoria</div>

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
                        action="{{ route('category.store') }}"
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
