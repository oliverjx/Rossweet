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
                            <h1 class="h2">Agrega Categorias:</h1>
                            {{-- <p class="h3 py-2">$25.00</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Easy Wear</strong></p>
                                </li>
                            </ul>

                            <h6>Add Category:</h6> --}}
                            <p>agrega una nueva categoria</p>

                            <div class="row py-5">
                                <form class="col-md-9 m-auto" method="post" role="form">

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputname">Nombre</label>
                                        <input type="text" class="form-control mt-1" id="name" name="name"
                                            placeholder="nombre">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="inputdescription">Descripcion</label>
                                        <input type="text" class="form-control mt-1" id="description" name="description"
                                            placeholder="Description">
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="inputmessage">Descripcion</label>
                                        <textarea class="form-control mt-1" id="description" name="description" placeholder="descripcion" rows="8"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        
                                        <label class="" for="inputGroupFile01">Foto</label>
                                        <input type="file" class="form-control" id="inputGroupFile01" accept="image/*">
                                      </div>
                                    <div class="row">
                                        {{-- <div class="col text-end mt-2">
                                            <button type="submit" class="btn btn-success btn-lg px-3">Add</button>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                {{-- <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span>
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span>
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span>
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity"
                                                    value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                    id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary"
                                                    id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                    id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit"
                                            value="buy">Agregar</button>
                                    </div>
                                    {{-- <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit"
                                            value="addtocard">Add To Cart</button>
                                    </div> --}}
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
