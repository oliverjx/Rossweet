
@extends('layouts.main')
@section('relleno')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{ asset('storage/img/' . $product->img) }}" alt="Card image cap"
                            id="product-detail">
                    </div>

                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $product->name }}</h1>
                            <p class="h3 py-2">{{ $product->price }}</p>
                            @if ($product->category != null)
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Categoría:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>{{ $product->category->name }}</strong></p>
                                    </li>
                                </ul>
                            @endif

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Cantidad:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $product->quantity }}</strong></p>
                                </li>
                            </ul>
                            @if ($product->type != null)
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Tipo:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>{{ $product->type->name }}</strong></p>
                                    </li>
                                </ul>
                            @endif


                            <h6>Descripción:</h6>
                            <p>{{ $product->description }}</p>

                            <h6>Timelapse:</h6>
                            <p>{{ $product->time_lapse }}</p>
                            <br>

                            <hr>
                            <form action="{{route ('detail_orders.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <h4>Añadir a un pedido</h4>
                                    <div class="col-auto">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <div class="container pd-5">
                                            <ul class="list-inline pb-3">
                                                Pedido:

                                                <select name="order_id" class="form-select" aria-label="Default select example">
                                                    @foreach ($orders as $order)
                                                        <option value="{{ $order->id }}">{{ $order->id }} -
                                                            {{ $order->client->name }}</option>
                                                    @endforeach
                                                </select>


                                                <br>
                                                <li class="list-inline-item text-right">
                                                    Cantidad:
                                                    <div class="form-group">
                                                        <input type="text" name="quantity" class="form-control" id="c" pattern="[0-9]*" inputmode="numeric" placeholder="Ingrese un número" required>
                                                        <div class="invalid-feedback">
                                                          Ingrese un número válido.
                                                        </div>
                                                      </div>
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row pb-3">

                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit"
                                            value="addtocard">Añadir a un pedido</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/templatemo.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </section>
    <!-- Close Content -->
@endsection
