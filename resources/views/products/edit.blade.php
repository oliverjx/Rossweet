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
                            <h1 class="h2">Producto:</h1>
                           
                            <p>edita el producto</p>

                            <div class="row py-5">
                                <div class="row py-5">
                                    <form class="col-md-9 m-auto" method="post"
                                        action="{{ route('products.update', ['id' => $product->id]) }}" role="form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="name">Nombre</label>
                                            <input type="text" class="form-control mt-1" id="name"
                                                name="name" placeholder="Nombre" value="{{ $product->name }}">
                                        </div>
                                        <label for="img">Imagen</label>
                                        <input type="file" class="form-control-file mt-1" id="img"
                                            name="img" accept="image/*">
                                        <img id="img-preview" src="#" alt="Imagen de la marca"
                                            style="display: none;">

                                            <label for="">imagen actual:</label>
                                            <img src="{{ asset('storage/img/' . $product->img) }}" alt="">
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="price">Precio</label>
                                            <input type="number" class="form-control mt-1" id="price"
                                                name="price" placeholder="Precio" value="{{ $product->price }}">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="description">Descripción</label>
                                            <input type="text" class="form-control mt-1" id="description"
                                                name="description" placeholder="Descripción" value="{{ $product->description }}">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="time_lapse">Intervalo de tiempo</label>
                                            <input type="text" class="form-control mt-1" id="time_lapse"
                                                name="time_lapse" placeholder="Intervalo de tiempo" value="{{ $product->time_lapse }}">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="disponibility">Disponibilidad</label>
                                            <select class="form-control mt-1" id="disponibility"
                                                name="disponibility">
                                                <option value="1" {{ $product->disponibility ? 'selected' : '' }}>Disponible</option>
                                                <option value="0" {{ !$product->disponibility ? 'selected' : '' }}>No disponible</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="offer">Oferta</label>
                                            <select class="form-control mt-1" id="offer" name="offer">
                                                <option value="1" {{ $product->offer ? 'selected' : '' }}>Sí</option>
                                                <option value="0" {{ !$product->offer ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="stock">Existencia</label>
                                            <input type="number" class="form-control mt-1" id="stock"
                                                name="stock" placeholder="Existencia" value="{{ $product->stock }}">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="quantity">Cantidad</label>
                                            <select class="form-control mt-1" id="quantity" name="quantity">
                                                <option value="individual" {{ $product->quantity === 'individual' ? 'selected' : '' }}>Individual</option>
                                                <option value="lote" {{ $product->quantity === 'lote' ? 'selected' : '' }}>Lote</option>
                                                <option value="combo" {{ $product->quantity === 'combo' ? 'selected' : '' }}>Combo</option>
                                                <option value="otro" {{ $product->quantity === 'otro' ? 'selected' : '' }}>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="category_id">Categoría</label>
                                            <select class="form-control mt-1" id="category_id"
                                                name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="type_id">Tipo</label>
                                            <select class="form-control mt-1" id="type_id" name="type_id">
                                                @foreach($types as $type)
                                                    <option value="{{ $type->id }}" {{ $type->id === $product->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route('products.index')}}" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</a>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
@endsection
