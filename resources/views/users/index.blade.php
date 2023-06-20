@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Usuarios</h1>
                            <p></p>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Crear nuevo usuario
                            </button>

                            {{-- Modal del formulario para agregar --}}
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Crear Usuario - Formulario
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row py-5">
                                                <form class="col-md-9 m-auto" method="post"
                                                    action="{{ route('users.store') }}" role="form">
                                                    @csrf
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="name">Nombre</label>
                                                        <input type="text" class="form-control mt-1" id="name"
                                                            name="name" placeholder="Nombre">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control mt-1" id="email"
                                                            name="email" placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="password">Contraseña</label>
                                                        <input type="password" class="form-control mt-1" id="password"
                                                            name="password" placeholder="Contraseña">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="rol">Rol</label>
                                                        <select class="form-control mt-1" id="rol" name="rol">
                                                            <option value="user">Usuario</option>
                                                            <option value="employee">Empleado</option>
                                                            <option value="admin">Administrador</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="state">Estado</label>
                                                        <select class="form-control mt-1" id="state" name="state">
                                                            <option value="1">Activo</option>
                                                            <option value="0">Inactivo</option>
                                                        </select>
                                                    </div>

                                                    <div class="row">
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

                            {{-- Tabla de usuarios --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h4 class="card-title">Lista de Usuarios</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nombre</th>
                                                            <th>Email</th>
                                                            <th>Rol</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <td>{{ $user->id }}</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>{{ $user->rol }}</td>
                                                                <td>
                                                                    @if ($user->state == 1)
                                                                        activo
                                                                    @endif
                                                                    @if ($user->state == 0)
                                                                        inactivo
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-toggle="modal"
                                                                        data-target="#editModal{{ $user->id }}">Editar</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#deleteModal{{ $user->id }}">Eliminar</button>
                                                                </td>
                                                            </tr>

                                                            {{-- Modal del formulario para editar --}}
                                                            <div class="modal fade" id="editModal{{ $user->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="editModal{{ $user->id }}Title"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="editModal{{ $user->id }}Title">
                                                                                Editar
                                                                                Usuario - Formulario</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row py-5">
                                                                                <form class="col-md-9 m-auto"
                                                                                    method="post"
                                                                                    action="{{ route('users.update', $user->id) }}"
                                                                                    role="form">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                    <div class="form-group col-md-6 mb-3">
                                                                                        <label
                                                                                            for="edit-name{{ $user->id }}">Nombre</label>
                                                                                        <input type="text"
                                                                                            class="form-control mt-1"
                                                                                            id="edit-name{{ $user->id }}"
                                                                                            name="name"
                                                                                            placeholder="Nombre"
                                                                                            value="{{ $user->name }}">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6 mb-3">
                                                                                        <label
                                                                                            for="edit-email{{ $user->id }}">Email</label>
                                                                                        <input type="email"
                                                                                            class="form-control mt-1"
                                                                                            id="edit-email{{ $user->id }}"
                                                                                            name="email"
                                                                                            placeholder="Email"
                                                                                            value="{{ $user->email }}">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6 mb-3">
                                                                                        <label
                                                                                            for="edit-password{{ $user->id }}">Contraseña</label>
                                                                                        <input type="password"
                                                                                            class="form-control mt-1"
                                                                                            id="edit-password{{ $user->id }}"
                                                                                            name="password"
                                                                                            placeholder="Contraseña">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6 mb-3">
                                                                                        <label
                                                                                            for="edit-rol{{ $user->id }}">Rol</label>
                                                                                        <select class="form-control mt-1"
                                                                                            id="edit-rol{{ $user->id }}"
                                                                                            name="rol">
                                                                                            <option value="user"
                                                                                                {{ $user->rol === 'user' ? 'selected' : '' }}>
                                                                                                Usuario
                                                                                            </option>
                                                                                            <option value="employee"
                                                                                                {{ $user->rol === 'employee' ? 'selected' : '' }}>
                                                                                                Empleado
                                                                                            </option>
                                                                                            <option value="admin"
                                                                                                {{ $user->rol === 'admin' ? 'selected' : '' }}>
                                                                                                Administrador
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6 mb-3">
                                                                                        <label
                                                                                            for="edit-state{{ $user->id }}">Estado</label>
                                                                                        <select class="form-control mt-1"
                                                                                            id="edit-state{{ $user->id }}"
                                                                                            name="state">
                                                                                            <option value="1"
                                                                                                {{ $user->state === '1' ? 'selected' : '' }}>
                                                                                                Activo
                                                                                            </option>
                                                                                            <option value="0"
                                                                                                {{ $user->state === '0' ? 'selected' : '' }}>
                                                                                                Inactivo
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col d-grid">
                                                                                            <button type="submit"
                                                                                                class="btn btn-success btn-lg"
                                                                                                name="submit"
                                                                                                value="buy">Guardar</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- Modal de confirmación de eliminación --}}
                                                            <div class="modal fade" id="deleteModal{{ $user->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="deleteModal{{ $user->id }}Title"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="deleteModal{{ $user->id }}Title">
                                                                                Eliminar
                                                                                Usuario</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>¿Estás seguro de que deseas eliminar este
                                                                                usuario?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancelar</button>
                                                                            <form method="post"
                                                                                action="{{ route('users.destroy', $user->id) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">Eliminar</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Cierre de la tabla de usuarios --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
@endsection
