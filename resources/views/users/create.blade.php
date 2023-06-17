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
                            <h1 class="h2">Agregar Usuario:</h1>
                            <p>Agrega un nuevo usuario</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{ route('users.store') }}" role="form">
                                    @csrf

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombre">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Contraseña">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="rol">Rol</label>
                                        <select class="form-control mt-1" id="rol" name="rol">
                                            <option value="user">User</option>
                                            <option value="employee">Employee</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col d-grid">
                                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Agregar</button>
                                        </div>
                                    </div>
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
