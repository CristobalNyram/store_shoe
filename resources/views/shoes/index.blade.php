@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Zapatos') }}
                    <a href="{{ route('shoes.create') }}" class="btn btn-sm btn-primary ">Crear</a>
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

                   @php
                   $route_image_shoes ='storage/';
                   @endphp
                   <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th  scope="col">Nombre</th>
                                <th  scope="col">Descripción</th>
                                <th  scope="col">Imagen</th>
                                <th  scope="col">Precio</th>
                                {{-- <th>Categoria</th>
                                <th>Modelo</th>
                                <th>Marca</th> --}}


                                <th>Estatus</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($shoes as $shoe )
                                <tr>

                                            <td class="text-center" scope="row">{{ $shoe->id }}</td>
                                            <td>{{ $shoe->title }}</td>
                                            <td>{{ $shoe->description }}</td>
                                            <td class="">
                                                @empty ($shoe->image_url)
                                                @else

                                                <a type="button" class="" data-bs-toggle="modal" data-bs-target="#viewimagemodal" onclick="viewImage(event,'{{  url($route_image_shoes.$shoe->image_url) }}');">
                                                    Ver imagen
                                                    </a>
                                                @endempty





                                            </td>
                                            <td>{{  $shoe->stock }}</td>
                                            {{-- <td>{{  $shoe->category_id }}</td>
                                            <td>{{  $shoe->model_id }}</td>
                                            <td>{{  $shoe->brand_id }}</td> --}}

                                            <td>
                                               @if ( $shoe->status==2)
                                               <div class="text-success ">
                                                Activo
                                               </div>

                                               @endif

                                               @if ( $shoe->status==-2)
                                               <div class="text-danger ">
                                                Desactivo

                                               </div>
                                              @endif
                                            </td>
                                            <td class="td-actions d-flex justify-content-around">
                                                <a href="{{ route('shoes.edit',$shoe)  }}" type="button" rel="tooltip"  class="btn btn-info btn-sm btn-icon">
                                                    <i class="bi bi-pen text-white">Editar</i>
                                                </a>
                                                {{-- <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                                                    <i class="now-ui-icons ui-2_settings-90">Ver</i>
                                                </button> --}}

                                                <form  method="POST" action="{{ route('shoes.destroy',$shoe)}}" >
                                                    @csrf
                                                    @method('DELETE')


                                                    <input type="submit" value="Desactivar"  onclick="return confirm('Desea desactivar el producto?')" rel="tooltip" class="btn btn-danger btn-sm btn-icon">


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
</div>


<!-- Button trigger modal -->
<script>
        function viewImage(event,url_image)
        {
            let current_input='';
            current_input=event.target;
            let set_in=  document.getElementById('moda_place_image');
            set_in.src='';
            set_in.src=url_image;

        }
</script>

  <!-- Modal -->
  <div class="modal fade" id="viewimagemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Imagen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <img id="moda_place_image" class="rounded mx-auto d-block" alt="..." width="200">

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endsection


