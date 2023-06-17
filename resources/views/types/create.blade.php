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
                            <h1 class="h2">Agrega Tipos:</h1>
                            <p>Agrega un nuevo tipo</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{route ('typeProducts.store')}}" role="form">

                                    <!-- Agregar el token CSRF -->
                                    @csrf

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name"
                                            placeholder="nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputmessage">Descripción</label>
                                        <textarea class="form-control mt-1" id="description" name="description"
                                            placeholder="descripción" rows="8"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col d-grid">
                                            <button type="submit" class="btn btn-success btn-lg" name="submit"
                                                value="buy">Agregar</button>
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
