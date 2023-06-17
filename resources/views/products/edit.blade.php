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
                            <h1 class="h2">Editar Producto:</h1>
                            <p>Editar información del producto</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" action="{{ route('products.update', ['product' => $product->id]) }}" role="form">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name"
                                            placeholder="Nombre" value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputprice">Precio</label>
                                        <input type="number" class="form-control mt-1" id="price" name="price"
                                            placeholder="Precio" step="0.01" value="{{ $product->price }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputmessage">Descripción</label>
                                        <textarea class="form-control mt-1" id="description" name="description" placeholder="Descripción" rows="8">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputtime_lapse">Lapso de tiempo</label>
                                        <input type="text" class="form-control mt-1" id="time_lapse" name="time_lapse"
                                            placeholder="Lapso de tiempo" value="{{ $product->time_lapse }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputdisponibility">Disponibilidad</label>
                                        <select class="form-control mt-1" id="disponibility" name="disponibility">
                                            <option value="1" {{ $product->disponibility ? 'selected' : '' }}>Disponible</option>
                                            <option value="0" {{ !$product->disponibility ? 'selected' : '' }}>No disponible</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputoffer">Oferta</label>
                                        <select class="form-control mt-1" id="offer" name="offer">
                                            <option value="1" {{ $product->offer ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ !$product->offer ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputstock">Stock</label>
                                        <input type="number" class="form-control mt-1" id="stock" name="stock"
                                            placeholder="Stock" value="{{ $product->stock }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputQuantity">Cantidad</label>
                                        <select class="form-control mt-1" id="Quantity" name="Quantity">
                                            <option value="individual" {{ $product->Quantity == 'individual' ? 'selected' : '' }}>Individual</option>
                                            <option value="lote" {{ $product->Quantity == 'lote' ? 'selected' : '' }}>Lote</option>
                                            <option value="combo" {{ $product->Quantity == 'combo' ? 'selected' : '' }}>Combo</option>
                                            <option value="otro" {{ $product->Quantity == 'otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputcategory_id">Categoría</label>
                                        <select class="form-control mt-1" id="category_id" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputtype_id">Tipo de producto</label>
                                        <select class="form-control mt-1" id="type_id" name="type_id">
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ $product->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
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
                                            <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Regresar</a>
                                        </div>
                                    </div>
                                </form>
                                <form id="delete-form" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display: none;">
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
