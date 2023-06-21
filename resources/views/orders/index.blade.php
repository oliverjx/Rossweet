<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

@extends('layouts.main')
@section('relleno')

    @if (Auth::check() && Auth::user()->rol == 'user')

        <!-- Open Content -->
        <section class="bg-light">
            <div class="container pb-5">
                <div class="row">
                    <!-- col end -->
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="h2">Agregar Pedido:</h1>
                                <p>Agrega un nuevo pedido</p>

                                <div class="row py-5">
                                    <form class="col-md-9 m-auto" method="post" action="{{ route('orders.store') }}"
                                        role="form">
                                        @csrf


                                        <div class="form-group col-md-6 mb-3">
                                            <label for="date_delivered">Fecha de Entrega</label>
                                            <input type="date" class="form-control mt-1" id="date_delivered"
                                                name="date_delivered">
                                            <label for="pay_method">Metodo de pago</label>
                                            <select name="pay_method" id="pay_method">
                                                <option value="cash">Efectivo</option>
                                                <option value="credit_card">Tarjeta de Credito</option>
                                                <option value="debit_card">Tarjeta de debito</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col text-end mt-2">
                                                <button type="submit" class="btn btn-success btn-lg px-3">Agregar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <h2>Sus Pedidos:</h2>
                                @if ($orders != null)
                                    @foreach ($orders as $order)
                                        <div class="card">
                                            <h5 class="card-header">{{ $order->id }}</h5>
                                            <div class="card-body">
                                                @switch($order->state)
                                                    @case('en espera')
                                                        <span class="badge rounded-pill text-bg-secondary">en espera</span>
                                                    @break

                                                    @case('cancelada')
                                                        <span class="badge rounded-pill text-bg-danger">cancelada</span>
                                                    @break

                                                    @case('aceptada')
                                                        <span class="badge rounded-pill text-bg-primary">aceptada</span>
                                                    @break

                                                    @case('entregada')
                                                        <span class="badge rounded-pill text-bg-success">entregada</span>
                                                    @break

                                                    @default
                                                        <span class="badge rounded-pill text-bg-info">por enviar</span>
                                                @endswitch


                                                <h5 class="card-title">{{ $order->client->name }}</h5>
                                                <p class="card-text">{{ $order->date_delivered }}</p>

                                                @if ($order->state == null)
                                                <form action="{{ route('orders.deliver', $order) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-info">Enviar</button>
                                                </form>
                                                @endif
                                                    
                                              
                                                <form action="{{ route('orders.destroy', $order) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <form action="{{ route('orders.edit', $order) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Ver</button>
                                                </form>

                                            </div>

                                        </div>
                                        <br>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif
    @if (Auth::check() && Auth::user()->rol == 'employee')

        <!-- Open Content -->
        <section class="bg-light">
            <div class="container pb-5">
                <div class="row">
                    <!-- col end -->
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">

                                <h2>Pedidos:</h2>
                                <br>

                                <form action="{{ route('orders.index') }}" method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <select class="form-control" name="filter">
                                            <option value="" @if (empty($filter)) selected @endif>All
                                            </option>
                                            <option value="1"@if ($filter == 1) selected @endif>en
                                                espera</option>
                                            <option value="2"@if ($filter == 2) selected @endif>
                                                canceladas</option>
                                            <option value="3"@if ($filter == 3) selected @endif>
                                                aceptadas</option>
                                            <option value="4"@if ($filter == 4) selected @endif>
                                                entregadas</option>
                                        </select>
                                        <button class="btn btn-primary" type="submit">Filtrar</button>
                                    </div>
                                </form>
                                <br>
                                @if ($orders != null)
                                    @foreach ($orders as $order)
                                        <div class="card">
                                            <h5 class="card-header">{{ $order->id }}</h5>
                                            <div class="card-body">
                                                @switch($order->state)
                                                    @case('en espera')
                                                        <span class="badge rounded-pill text-bg-secondary">en espera</span>
                                                    @break

                                                    @case('cancelada')
                                                        <span class="badge rounded-pill text-bg-danger">cancelada</span>
                                                    @break

                                                    @case('aceptada')
                                                        <span class="badge rounded-pill text-bg-primary">aceptada</span>
                                                    @break

                                                    @case('entregada')
                                                        <span class="badge rounded-pill text-bg-success">entregada</span>
                                                    @break

                                                    @default
                                                        <span class="badge rounded-pill text-bg-info">por enviar</span>
                                                @endswitch


                                                <h5 class="card-title">{{ $order->client->name }}</h5>
                                                <p class="card-text">{{ $order->date_delivered }}</p>


                                                <form action="{{ route('orders.edit', $order) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info">Ver</button>
                                                </form>

                                                @if ($order->state == 'en espera')
                                                    <form action="{{ route('orders.canceled', ['id' => $order->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-danger">cancelar
                                                            pedido</button>
                                                    </form>
                                                    <form action="{{ route('orders.accepted', ['id' => $order->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-primary">aceptar
                                                            pedido</button>
                                                    </form>
                                                @endif


                                                @if ($order->state == 'aceptada')
                                                    <form action="{{ route('orders.delivered', ['id' => $order->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success">marcar como
                                                            entregada</button>
                                                    </form>
                                                @endif
                                            </div>

                                        </div>
                                        <br>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif


@endsection
