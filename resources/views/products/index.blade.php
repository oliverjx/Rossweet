@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Productos</h1>
                            <p></p>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Crear nuevo producto
                            </button>

                            {{-- modal del formulario para agregar --}}
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Crear Producto - Formulario</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form class="col-md-9 m-auto" method="post"
                                                    action="{{ route('products.store') }}" role="form">
                                                    @csrf
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="name">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="name"
                                                            name="name" placeholder="Nombre">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="price">Precio</label>
                                                        <input type="number" class="form-control mt-1" id="price"
                                                            name="price" placeholder="Precio">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="description">Descripción</label>
                                                        <input type="text" class="form-control mt-1" id="description"
                                                            name="description" placeholder="Descripción">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="time_lapse">Intervalo de tiempo</label>
                                                        <input type="text" class="form-control mt-1" id="time_lapse"
                                                            name="time_lapse" placeholder="Intervalo de tiempo">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="disponibility">Disponibilidad</label>
                                                        <select class="form-control mt-1" id="disponibility"
                                                            name="disponibility">
                                                            <option value="1">Disponible</option>
                                                            <option value="0">No disponible</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="offer">Oferta</label>
                                                        <select class="form-control mt-1" id="offer" name="offer">
                                                            <option value="1">Sí</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="stock">Existencia</label>
                                                        <input type="number" class="form-control mt-1" id="stock"
                                                            name="stock" placeholder="Existencia">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="quantity">Cantidad</label>
                                                        <select class="form-control mt-1" id="quantity" name="quantity">
                                                            <option value="individual">Individual</option>
                                                            <option value="lote">Lote</option>
                                                            <option value="combo">Combo</option>
                                                            <option value="otro">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="category_id">Categoría</label>
                                                        <select class="form-control mt-1" id="category_id"
                                                            name="category_id">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="type_id">Tipo</label>
                                                        <select class="form-control mt-1" id="type_id" name="type_id">
                                                            @foreach($types as $type)
                                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mt-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Intervalo de tiempo</th>
                                            <th scope="col">Disponibilidad</th>
                                            <th scope="col">Oferta</th>
                                            <th scope="col">Existencia</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Categoría</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->time_lapse }}</td>
                                                <td>{{ $product->disponibility ? 'Disponible' : 'No disponible' }}</td>
                                                <td>{{ $product->offer ? 'Sí' : 'No' }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>{{ $product->Quantity }}</td>
                                                <td>{{ $product->category ? $product->category->name : '-' }}</td>
                                                <td>{{ $product->typeProduct ? $product->typeProduct->name : '-' }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-primary btn-sm">Editar</a>
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
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
