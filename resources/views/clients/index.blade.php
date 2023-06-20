@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Clientes</h1>
                            <p></p>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Crea un nuevo cliente
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
                                                    action="{{ route('clients.store') }}" role="form">
                                                    @csrf
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputname">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="name"
                                                            name="name" placeholder="nombre">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputlast_name">Apellido</label>
                                                        <input type="text" class="form-control mt-1" id="last_name"
                                                            name="last_name" placeholder="apellido">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputemail">Email</label>
                                                        <input type="email" class="form-control mt-1" id="email"
                                                            name="email" placeholder="correo electrónico">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputpassword">Clave</label>
                                                        <input type="password" class="form-control mt-1" id="password"
                                                            name="password" placeholder="clave">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputphone_number">Número de teléfono</label>
                                                        <input type="tel" class="form-control mt-1" id="phone_number"
                                                            name="phone_number" placeholder="teléfono">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputdirection">Dirección</label>
                                                        <input type="text" class="form-control mt-1" id="direction"
                                                            name="direction" placeholder="dirección">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputbirthday">Fecha de nacimiento</label>
                                                        <input type="date" class="form-control mt-1" id="birthday"
                                                            name="birthday">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputgender">Género</label>
                                                        <select class="form-control mt-1" id="gender" name="gender">
                                                            <option value="Masc">Masculino</option>
                                                            <option value="Femn">Femenino</option>
                                                            <option value="NoB">No binario</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="inputnotes">Notas</label>
                                                        <textarea class="form-control mt-1" id="notes" name="notes" placeholder="notas"></textarea>
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
                                            <h5 class="modal-title" id="exampleModalLongTitle">Editar cliente - form</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form id="edit-client-form" class="col-md-9 m-auto" method="post"
                                                    action="{{ route('clients.update', ['client' => ':client_id']) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="client_id" id="edit-client-id"
                                                        value="">

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-name">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="edit-name"
                                                            name="edit-name" placeholder="nombre">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-lastname">Apellido</label>
                                                        <input type="text" class="form-control mt-1"
                                                            id="edit-lastname" name="edit-lastname"
                                                            placeholder="apellido">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-email">Email</label>
                                                        <input type="email" class="form-control mt-1" id="edit-email"
                                                            name="edit-email" placeholder="correo electrónico">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-phonenumber">Número de teléfono</label>
                                                        <input type="tel" class="form-control mt-1"
                                                            id="edit-phonenumber" name="edit-phonenumber"
                                                            placeholder="teléfono">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-direction">Dirección</label>
                                                        <input type="text" class="form-control mt-1"
                                                            id="edit-direction" name="edit-direction"
                                                            placeholder="dirección">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-birthday">Fecha de nacimiento</label>
                                                        <input type="date" class="form-control mt-1"
                                                            id="edit-birthday" name="edit-birthday">
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-gender">Género</label>
                                                        <select class="form-control mt-1" id="edit-gender"
                                                            name="edit-gender">
                                                            <option value="Masc">Masculino</option>
                                                            <option value="Femn">Femenino</option>
                                                            <option value="NoB">No binario</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="edit-notes">Notas</label>
                                                        <textarea class="form-control mt-1" id="edit-notes" name="edit-notes" placeholder="notas"></textarea>
                                                    </div>

                                                    <div class="row pb-3">
                                                        <div class="col d-grid">
                                                            <button type="submit" class="btn btn-success btn-lg"
                                                                name="submit" value="update">Actualizar</button>
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
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Direction</th>
                                            <th>Birthday</th>
                                            <th>Gender</th>
                                            <th>Notes</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->last_name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone_number }}</td>
                                                <td>{{ $client->direction }}</td>
                                                <td>{{ $client->birthday }}</td>
                                                <td>{{ $client->Gender }}</td>
                                                <td>{{ $client->notes }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalCenter-edit"
                                                        data-client-id="{{ $client->id }}"
                                                        data-client-name="{{ $client->name }}"
                                                        data-client-lastname="{{ $client->last_name }}"
                                                        data-client-email="{{ $client->email }}"
                                                        data-client-phonenumber="{{ $client->phone_number }}"
                                                        data-client-direction="{{ $client->direction }}"
                                                        data-client-birthday="{{ $client->birthday }}"
                                                        data-client-gender="{{ $client->Gender }}"
                                                        data-client-notes="{{ $client->notes }}">
                                                        Editar
                                                    </button>
                            
                                                    <form action="{{ route('clients.destroy', [$client]) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm rounded-square" data-toggle="modal"
                                                            data-target="#confirmationModal-{{ $client->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M1.5 4.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5v.5H1v-.5zm1 0v-.5a1.5 1.5 0 0 1 1.5-1.5h9a1.5 1.5 0 0 1 1.5 1.5v.5h-12zm2-.5v9a1.5 1.5 0 0 0 1.5 1.5h5a1.5 1.5 0 0 0 1.5-1.5v-9h-8z" />
                                                                <path
                                                                    d="M4.5 1.5v-.5A1.5 1.5 0 0 1 6 .5h4a1.5 1.5 0 0 1 1.5 1.5v.5h-8z" />
                                                            </svg>
                                                        </button>
                            
                                                        <!-- Modal de confirmación -->
                                                        <div class="modal fade" id="confirmationModal-{{ $client->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="confirmationModalLabel-{{ $client->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="confirmationModalLabel-{{ $client->id }}">Confirmar eliminación</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>¿Estás seguro de que deseas eliminar al cliente {{ $client->name }}?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <form action="{{ route('clients.destroy', [$client]) }}" method="POST" style="display: inline-block;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
                var clientId = button.data('client-id'); // Obtener el ID del cliente
                var clientName = button.data('client-name'); // Obtener el nombre del cliente
                var clientLastName = button.data('client-lastname'); // Obtener el apellido del cliente
                var clientEmail = button.data('client-email'); // Obtener el correo electrónico del cliente
                var clientPhoneNumber = button.data('client-phonenumber'); // Obtener el número de teléfono del cliente
                var clientDirection = button.data('client-direction'); // Obtener la dirección del cliente
                var clientBirthday = button.data('client-birthday'); // Obtener la fecha de cumpleaños del cliente
                var clientGender = button.data('client-gender'); // Obtener el género del cliente
                var clientNotes = button.data('client-notes'); // Obtener las notas del cliente
    
                // Asignar los valores a los campos del formulario de edición
                $(this).find('#edit-name').val(clientName);
                $(this).find('#edit-lastname').val(clientLastName);
                $(this).find('#edit-email').val(clientEmail);
                $(this).find('#edit-phonenumber').val(clientPhoneNumber);
                $(this).find('#edit-direction').val(clientDirection);
                $(this).find('#edit-birthday').val(clientBirthday);
                $(this).find('#edit-gender').val(clientGender);
                $(this).find('#edit-notes').val(clientNotes);
                $(this).find('#edit-client-id').val(clientId);
    
                // Actualizar la acción del formulario para que incluya el ID del cliente
                var formAction = "{{ route('clients.update', ['client' => ':client_id']) }}";
                formAction = formAction.replace(':client_id', clientId);
                $(this).find('#edit-client-form').attr('action', formAction);
            });
        });
    </script>
    
@endsection
