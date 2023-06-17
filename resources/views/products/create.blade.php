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
                            <h1 class="h2">Agrega Productos:</h1>
                            <p>Agrega un nuevo producto</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{ route('products.store') }}" role="form">
                                    @csrf

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputmessage">Descripción</label>
                                        <textarea class="form-control mt-1" id="description" name="description" placeholder="Descripción" rows="8"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputprice">Precio</label>
                                        <input type="text" class="form-control mt-1" id="price" name="price" placeholder="Precio">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputtime_lapse">Lapso de tiempo</label>
                                        <input type="text" class="form-control mt-1" id="time_lapse" name="time_lapse" placeholder="Lapso de tiempo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputdisponibility">Disponibilidad</label>
                                        <select class="form-control mt-1" id="disponibility" name="disponibility">
                                            <option value="1">Disponible</option>
                                            <option value="0">No disponible</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputoffer">Oferta</label>
                                        <select class="form-control mt-1" id="offer" name="offer">
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputstock">Stock</label>
                                        <input type="text" class="form-control mt-1" id="stock" name="stock" placeholder="Stock">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputquantity">Cantidad</label>
                                        <select class="form-control mt-1" id="quantity" name="quantity">
                                            <option value="individual">Individual</option>
                                            <option value="lote">Lote</option>
                                            <option value="combo">Combo</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputcategory">Categoría</label>
                                        <select class="form-control mt-1" id="category" name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputtype">Tipo</label>
                                        <select class="form-control mt-1" id="type" name="type">
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                    </div>
                                </form>
                            </div>

                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="product-title" value="Activewear">
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
