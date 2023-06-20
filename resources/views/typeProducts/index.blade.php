@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Tipos de productos</h1>
                            <p></p>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Crea un nuevo tipo de producto
                            </button>

                            {{-- modal del formulario para agregar --}}
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Crear Tipo de Producto - form</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form class="col-md-9 m-auto" method="post"
                                                    action="{{ route('typesProducts.store') }}" role="form">
                                                    @csrf
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="name">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="name"
                                                            name="name" placeholder="Nombre">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description">Descripción</label>
                                                        <textarea class="form-control mt-1" id="description" name="description" placeholder="Descripción" rows="8"></textarea>
                                                    </div>

                                                    <div class="row pb-3">
                                                        <div class="col d-grid">
                                                            <button type="submit" class="btn btn-success btn-lg"
                                                                name="submit" value="buy">Crear</button>
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

                            {{-- modal de edicion --}}
                            <div class="modal fade" id="exampleModalCenter-edit" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Editar Tipo de Producto - form</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form id="edit-type-product-form" class="col-md-9 m-auto" method="post"
                                                    action="{{ route('typesProducts.update', ['typeProduct' => ':type_product_id']) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="type_product_id" id="edit-type-product-id" value="">
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-name">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="edit-name"
                                                            name="edit-name" placeholder="Nombre" value="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit-description">Descripción</label>
                                                        <textarea class="form-control mt-1" id="edit-description" name="edit-description" placeholder="Descripción"
                                                            rows="8"></textarea>
                                                    </div>
                                                    <div class="row pb-3">
                                                        <div class="col d-grid">
                                                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="update">Actualizar</button>
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

                        {{-- tabla de tipos de productos --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($typesProducts as $typeProduct)
                                            <tr>
                                                <td>{{ $typeProduct->name }}</td>
                                                <td>{{ $typeProduct->description }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalCenter-edit"
                                                        data-type-product-id="{{ $typeProduct->id }}"
                                                        data-type-product-name="{{ $typeProduct->name }}"
                                                        data-type-product-description="{{ $typeProduct->description }}">
                                                        Editar
                                                    </button>

                                                    <form
                                                        action="{{ route('typesProducts.destroy', [$typeProduct]) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm rounded-square"
                                                            data-toggle="modal"
                                                            data-target="#confirmationModal-{{ $typeProduct->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-trash"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M1.5 4.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5v.5H1v-.5zm1 0v-.5a1.5 1.5 0 0 1 1.5-1.5h9a1.5 1.5 0 0 1 1.5 1.5v.5h-12zm2-.5v9a1.5 1.5 0 0 0 1.5 1.5h5a1.5 1.5 0 0 0 1.5-1.5v-9h-8z" />
                                                                <path
                                                                    d="M4.5 1.5v-.5A1.5 1.5 0 0 1 6 .5h4a1.5 1.5 0 0 1 1.5 1.5v.5h-8z" />
                                                            </svg>
                                                        </button>

                                                        <!-- Modal de confirmación -->
                                                        <div class="modal fade" id="confirmationModal-{{ $typeProduct->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="confirmationModalLabel-{{ $typeProduct->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="confirmationModalLabel-{{ $typeProduct->id }}">
                                                                            Confirmar eliminación</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>¿Estás seguro de que deseas eliminar el tipo de producto
                                                                            {{ $typeProduct->name }} ?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <form
                                                                            action="{{ route('typesProducts.destroy', [$typeProduct]) }}"
                                                                            method="POST" style="display: inline-block;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Eliminar</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

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
                var typeProductId = button.data('type-product-id'); // Obtener el ID del tipo de producto
                var typeProductName = button.data('type-product-name'); // Obtener el nombre del tipo de producto
                var typeProductDescription = button.data(
                'type-product-description'); // Obtener la descripción del tipo de producto

                // Asignar los valores a los campos del formulario de edición
                $(this).find('#edit-name').val(typeProductName);
                $(this).find('#edit-description').val(typeProductDescription);
                $(this).find('#edit-type-product-id').val(typeProductId);

                // Actualizar la acción del formulario para que incluya el ID del tipo de producto
                var formAction = "{{ route('typesProducts.update', ['typeProduct' => ':type_product_id']) }}";
                formAction = formAction.replace(':type_product_id', typeProductId);
                $(this).find('#edit-type-product-form').attr('action', formAction);
            });
        });
        
    </script>
@endsection

