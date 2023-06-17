@extends('layouts.main')

@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Editar Usuario:</h1>
                            <p>Editar información del usuario</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{ route('users.update', ['user' => $user->id]) }}" role="form">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name"
                                            placeholder="Nombre" value="{{ $user->name }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="rol">Rol</label>
                                        <select class="form-select mt-1" id="rol" name="rol">
                                            <option value="user" {{ $user->rol === 'user' ? 'selected' : '' }}>User</option>
                                            <option value="employee" {{ $user->rol === 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control mt-1" id="email" name="email"
                                            placeholder="Email" value="{{ $user->email }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control mt-1" id="password" name="password"
                                            placeholder="Contraseña">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="state">Estado</label>
                                        <select class="form-select mt-1" id="state" name="state">
                                            <option value="1" {{ $user->state === 1 ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ $user->state === 0 ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="row pb-3">
                                        <div class="col d-grid">
                                            <button type="submit" class="btn btn-success btn-lg" name="submit"
                                                value="update">Actualizar</button>
                                        </div>
                                        <div class="col d-grid">
                                            <button type="submit" class="btn btn-danger btn-lg" name="submit"
                                                value="delete" form="delete-form">Eliminar</button>
                                        </div>
                                        <div class="col d-grid">
                                            <a href="{{ route('users.index') }}" class="btn btn-light btn-lg">Regresar</a>
                                        </div>
                                    </div>
                                </form>
                                <form id="delete-form" action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
@endsection
