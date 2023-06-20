@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Marcas</h1>
                            <p></p>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Agregar una nueva marca
                            </button>

                            {{-- Modal para agregar marca --}}
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Crear Marca</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form class="col-md-9 m-auto" method="post"
                                                    action="{{ route('brands.store') }}" role="form"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="brand_id" id="edit-brand-id" value="">
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="model">model</label>
                                                        <input type="text" class="form-control mt-1" id="model"
                                                            name="model" placeholder="Nombre">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="img">Imagen</label>
                                                        <input type="file" class="form-control mt-1" id="img"
                                                            name="img" accept="image/*">
                                                    </div>
                                                    <div class="row pb-3">
                                                        <div class="col d-grid">
                                                            <button type="submit" class="btn btn-success btn-lg"
                                                                name="submit" value="create">Crear</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- Modal de edición --}}
                        <div class="modal fade" id="exampleModalCenter-edit" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Marca - Formulario</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row py-5">
                                            <form id="edit-brand-form" class="col-md-9 m-auto" method="post"
                                                action="{{ route('brands.update', ['brand' => ':brand_id']) }}"
                                                enctype="multipart/form-data" >
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="brand_id" id="edit-brand-id" value="">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="edit-model">Modelo</label>
                                                    <input type="text" class="form-control mt-1" id="edit-model"
                                                        name="edit-model" placeholder="Modelo" value="">
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="edit-img">Imagen</label>
                                                    <input type="file" class="form-control-file mt-1" id="edit-img"
                                                        name="edit-img" accept="image/*">
                                                    <img id="edit-img-preview" src="#" alt="Imagen de la marca"
                                                        style="display: none;">
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col d-grid">
                                                        <button type="submit" class="btn btn-success btn-lg"
                                                            name="submit" value="update">
                                                            Actualizar
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Tabla de marcas --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->model }}</td>
                                                <td><img src="{{ asset('storage/img/' . $brand->img) }}"
                                                        alt="Imagen de la marca"></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalCenter-edit"
                                                        data-brand-id="{{ $brand->id }}"
                                                        data-brand-model="{{ $brand->model }}"
                                                        data-brand-img="{{ $brand->img }}">
                                                        Editar
                                                    </button>

                                                    <form action="{{ route('brands.destroy', [$brand]) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
    </section>
    <!-- Close Content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#exampleModalCenter-edit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Obtener el botón que desencadenó el evento
                var brandId = button.data('brand-id');
                var brandModel = button.data('brand-model');
                var brandImg = button.data('brand-img');

                // Asignar los valores a los campos del formulario de edición
                $(this).find('#edit-brand-id').val(brandId);
                $(this).find('#edit-model').val(brandModel);
                var imagePreviewUrl = "{{ asset('storage/img/') }}" + '/' + brandImg;
                $(this).find('#edit-img-preview').attr('src', imagePreviewUrl).show();


                // Actualizar la acción del formulario para que incluya el ID de la marca
                var formAction = "{{ route('brands.update', ['brand' => ':brand_id']) }}";
                formAction = formAction.replace(':brand_id', brandId);
                $(this).find('#edit-brand-form').attr('action', formAction);

            });
        });
    </script>
@endsection
