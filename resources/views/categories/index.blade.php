@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Categorias</h1>
                            <p></p>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Crea una nueva categoria
                            </button>

                            {{-- modal del formulario para agregar --}}
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Crear Categoria - form</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form class="col-md-9 m-auto" method="post"
                                                    action="{{ route('categories.store') }}" role="form">
                                                    @csrf
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputname">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="name"
                                                            name="name" placeholder="nombre">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputmessage">Descripcion</label>
                                                        <textarea class="form-control mt-1" id="description" name="description" placeholder="descripcion" rows="8"></textarea>
                                                    </div>

                                                    <div class="row">
                                                        <form action="" method="GET">
                                                            <input type="hidden" name="product-title" value="Activewear">
                                                            <div class="row pb-3">
                                                                <div class="col d-grid">
                                                                    <button type="submit" class="btn btn-success btn-lg"
                                                                        name="submit" value="buy">Crear</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
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
                                            <h5 class="modal-title" id="exampleModalLongTitle">Editar Categoria - form</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form id="edit-category-form" class="col-md-9 m-auto" method="post"
                                                    action="{{ route('categories.update', ['category' => ':category_id']) }}"
                                                    >
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="category_id" id="edit-category-id" value="">
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-name">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="edit-name"
                                                            name="edit-name" placeholder="Nombre" value="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputmessage">Descripción</label>
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
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- tabla de categorias --}}
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
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalCenter-edit"
                                                        data-category-id="{{ $category->id }}"
                                                        data-category-name="{{ $category->name }}"
                                                        data-category-description="{{ $category->description }}">
                                                        Editar
                                                    </button>

                                                    <form
                                                        action="{{ route('categories.destroy', [$category]) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm rounded-square"
                                                            data-toggle="modal"
                                                            data-target="#confirmationModal-{{ $category->id }}">
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
                                                        <div class="modal fade" id="confirmationModal-{{ $category->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="confirmationModalLabel-{{ $category->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="confirmationModalLabel-{{ $category->id }}">
                                                                            Confirmar eliminación</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>¿Estás seguro de que deseas eliminar la categoría
                                                                            {{ $category->name }} ?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <form
                                                                            action="{{ route('categories.destroy', [$category]) }}"
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
                var categoryId = button.data('category-id'); // Obtener el ID de la categoría
                var categoryName = button.data('category-name'); // Obtener el nombre de la categoría
                var categoryDescription = button.data(
                'category-description'); // Obtener la descripción de la categoría

                // Asignar los valores a los campos del formulario de edición
                $(this).find('#edit-name').val(categoryName);
                $(this).find('#edit-description').val(categoryDescription);
                $(this).find('#edit-category-id').val(categoryId);

                // Actualizar la acción del formulario para que incluya el ID de la categoría
                var formAction = "{{ route('categories.update', ['category' => ':category_id']) }}";
                formAction = formAction.replace(':category_id', categoryId);
                $(this).find('#edit-category-form').attr('action', formAction);
            });
        });
        
    </script>
@endsection
