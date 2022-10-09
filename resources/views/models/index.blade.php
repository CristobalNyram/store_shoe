@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Modelos') }}
                    <a href="{{ route('models.create') }}" class="btn btn-sm btn-primary ">Crear</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                     @endif
                    @if ($errors->any())

                                @foreach ($errors->all() as $error)


                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @endforeach
                   @endif


                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estatus</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($models as $modelsho )
                                <tr>

                                            <td class="text-center">1</td>
                                            <td>{{ $modelsho->title }}</td>
                                            <td>{{ $modelsho->description }}</td>
                                            <td>
                                               @if ( $modelsho->status==2)
                                               <div class="text-success ">
                                                Activo
                                               </div>

                                               @endif

                                               @if ( $modelsho->status==-2)
                                               <div class="text-danger ">
                                                Desactivo

                                               </div>
                                              @endif
                                            </td>
                                            <td class="td-actions d-flex justify-content-around">
                                                <a href="{{ route('models.edit',$modelsho)  }}" type="button" rel="tooltip"  class="btn btn-info btn-sm btn-icon">
                                                    <i class="bi bi-pen text-white">Editar</i>
                                                </a>
                                                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                                                    <i class="now-ui-icons ui-2_settings-90">Ver</i>
                                                </button>

                                                <form  method="POST" action="{{ route('models.destroy',$modelsho)}}" >
                                                    @csrf
                                                    @method('DELETE')


                                                    <input type="submit" value="Desactivar"  onclick="return confirm('Desea desactivar el modelo?')" rel="tooltip" class="btn btn-danger btn-sm btn-icon">


                                                </form>

                                            </td>
                                </tr>

                                @endforeach



                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
