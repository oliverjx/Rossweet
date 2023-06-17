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
                            <h1 class="h2">Editar Categoría:</h1>
                            <p>Editar información de la categoría</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{ route('categories.update', ['category' => $category->id]) }}" role="form">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name"
                                            placeholder="Nombre" value="{{ $category->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputmessage">Descripción</label>
                                        <textarea class="form-control mt-1" id="description" name="description" placeholder="Descripción" rows="8">{{ $category->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="" for="inputGroupFile01">Foto</label>
                                        <input type="file" class="form-control" id="inputGroupFile01" accept="image/*">
                                    </div>
                                    <div class="row">
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
                                            <a href="{{ route('categories.index') }}" class="btn btn-light btn-lg">Regresar</a>
                                        </div>
                                    </div>
                                </form>
                                <form id="delete-form" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display: none;">
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
