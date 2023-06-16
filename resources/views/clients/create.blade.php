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
                            <h1 class="h2">Agregar Clientes:</h1>
                            <p>Agrega un nuevo cliente</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{route ('clients.store')}}" role="form">

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombre">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputlastname">Apellido</label>
                                        <input type="text" class="form-control mt-1" id="last_name" name="last_name" placeholder="Apellido">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputemail">Email</label>
                                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputpassword">Contraseña</label>
                                        <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputphone">Número de teléfono</label>
                                        <input type="text" class="form-control mt-1" id="phone_number" name="phone_number" placeholder="Número de teléfono">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputdirection">Dirección</label>
                                        <input type="text" class="form-control mt-1" id="direction" name="direction" placeholder="Dirección">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputbirthday">Fecha de nacimiento</label>
                                        <input type="date" class="form-control mt-1" id="birthday" name="birthday">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputgender">Género</label>
                                        <select class="form-control mt-1" id="gender" name="gender">
                                            <option value="Masc">Masculino</option>
                                            <option value="Femn">Femenino</option>
                                            <option value="NoB">No binario</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="inputnotes">Notas</label>
                                        <textarea class="form-control mt-1" id="notes" name="notes" placeholder="Notas" rows="8"></textarea>
                                    </div>
                                    
                                    <div class="row">
                                    </div>
                                </form>
                            </div>

                            <form action="" method="GET">
                                <input type="hidden" name="client-title" value="Nuevo cliente">
                                <div class="row pb-3">
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
    </section>
    <!-- Close Content -->
@endsection
