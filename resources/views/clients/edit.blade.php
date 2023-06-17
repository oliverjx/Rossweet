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
                            <h1 class="h2">Editar Cliente:</h1>
                            <p>Editar información del cliente</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{ route('clients.update', ['client' => $client->id]) }}" role="form">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name"
                                            placeholder="Nombre" value="{{ $client->name }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputlastname">Apellido</label>
                                        <input type="text" class="form-control mt-1" id="last_name" name="last_name"
                                            placeholder="Apellido" value="{{ $client->last_name }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputemail">Email</label>
                                        <input type="email" class="form-control mt-1" id="email" name="email"
                                            placeholder="Email" value="{{ $client->email }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputphone">Número de Teléfono</label>
                                        <input type="text" class="form-control mt-1" id="phone_number" name="phone_number"
                                            placeholder="Número de Teléfono" value="{{ $client->phone_number }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputdirection">Dirección</label>
                                        <input type="text" class="form-control mt-1" id="direction" name="direction"
                                            placeholder="Dirección" value="{{ $client->direction }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputbirthday">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control mt-1" id="birthday" name="birthday"
                                            value="{{ $client->birthday }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputgender">Género</label>
                                        <select class="form-control mt-1" id="gender" name="gender">
                                            <option value="Masc" @if($client->gender === 'Masc') selected @endif>Masculino</option>
                                            <option value="Femn" @if($client->gender === 'Femn') selected @endif>Femenino</option>
                                            <option value="NoB" @if($client->gender === 'NoB') selected @endif>No Binario</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="inputnotes">Notas</label>
                                        <textarea class="form-control mt-1" id="notes" name="notes" placeholder="Notas" rows="8">{{ $client->notes }}</textarea>
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
                                            <a href="{{ route('clients.index') }}" class="btn btn-light btn-lg">Regresar</a>
                                        </div>
                                    </div>
                                </form>
                                <form id="delete-form" action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="POST" style="display: none;">
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
