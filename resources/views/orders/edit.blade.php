@extends('layouts.main')
@section('relleno')

                @if (Auth::check() && Auth::user()->rol  == 'user' )


                        @if ($order->state != null)
                                <section class="bg-light">
                                    <div class="container pb-5">
                                        <div class="row">
                                            <div class="col-lg-7 mt-5">
                                                <div class="card">
                                                    <a href="{{route('orders.index')}}" class="btn btn-secundary">
                                                        volver
                                                    </a>
                                                    <div class="card-body">
                                                        <h1 class="h2"> Orden:</h1>
                                                        <p>Ve la orden</p>
                                                    
                                                    
                                                            <form class="col-md-9 m-auto" method="post" role="form">
                                                            
                                                                <div class="form-group col-md-6 mb-3">
                                                                    <label for="client_id">Cliente</label>
                                                                    <input type="text" class="form-control mt-1" id="client_id" name="client_id"
                                                                        placeholder="Cliente" value="{{ $order->client->name }}" disabled>
                                                                </div>
                                                            
                                                                <div class="form-group col-md-6 mb-3">
                                                                    <label for="user_id">Usuario</label>
                                                                    <input type="text" class="form-control mt-1" id="user_id" name="user_id"
                                                                        placeholder="Usuario"
                                                                        value="{{ $order->user ? $order->user->name : 'none' }}"disabled>
                                                                </div>
                                                            
                                                                <div class="form-group col-md-6 mb-3">
                                                                    <label for="state">Estado</label>
                                                                    <input type="text" class="form-control mt-1" id="state" name="state"
                                                                    placeholder="state"
                                                                    value="{{ $order->state}}"disabled>
                                                                </div>
                                                            
                                                                <div class="form-group col-md-6 mb-3">
                                                                    <label for="date_delivered">Fecha de Entrega</label>
                                                                    <input type="date" class="form-control mt-1" id="date_delivered"
                                                                        name="date_delivered" value="{{ $order->date_delivered }}" disabled>
                                                                </div>
                                                            
                                                                <div class="form-group col-md-6 mb-3">
                                                                    <label for="pay_method">Método de Pago</label>
                                                                    <select class="form-control mt-1" id="pay_method" name="pay_method" disabled>
                                                                        <option value="cash" @if ($order->pay_method == 'cash') selected @endif>
                                                                            Efectivo</option>
                                                                        <option value="credit_card" @if ($order->pay_method == 'credit_card') selected @endif>
                                                                            Tarjeta de Crédito</option>
                                                                        <option value="debit_card" @if ($order->pay_method == 'debit_card') selected @endif>
                                                                            Tarjeta de Débito</option>
                                                                    </select>
                                                                </div>
                                                            
                                                            </form>
                                                        
                                                            <div class="row">
                                                                @foreach ($order->DetailOrder as $index => $detail)
                                                                    <div class="col-md-6 mb-3">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <img src="{{ asset('storage/img/' . $detail->product->img) }}" class="card-img-top"
                                                                                alt="imagen de {{ $detail->product->name }}">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Detail: {{ $detail->product->name }}</h5>
                                                                                <p class="card-text">
                                                                                    <b>precio:</b> {{ $detail->price }}<br>
                                                                                    <strong>cantidad:</strong> {{ $detail->quantity }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    @if (($index + 1) % 2 === 0 || $loop->last)
                                                                        </div>
                                                                        @if (!$loop->last)
                                                                            <div class="row">
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                        @else

                        <section class="bg-light">
                            <div class="container pb-5">
                                <div class="row">
                                    <div class="col-lg-7 mt-5">
                                        <div class="card">
                                            <a href="{{route('orders.index')}}" class="btn btn-secundary">
                                                volver
                                            </a>
                                            <div class="card-body">
                                                <h1 class="h2"> Orden:</h1>
                                                <p>Ve la orden</p>
                                            
    
                                                    <form action="{{route('orders.update', ['id' => $order->id])}}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                  
                                                   
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="client_id">Cliente</label>
                                                            <input type="text" class="form-control mt-1" id="client_id" name="client_id"
                                                                placeholder="Cliente" value="{{ $order->client->name }}" disabled>
                                                        </div>
                                                    
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="user_id">Usuario</label>
                                                            <input type="text" class="form-control mt-1" id="user_id" name="user_id"
                                                                placeholder="Usuario"
                                                                value="no ha enviada"disabled>
                                                        </div>
    
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="state">Estado</label>
                                                            <select class="form-control mt-1" id="state" name="state" disabled >
                                                                <option value="en espera" selected >En
                                                                    Espera</option>
                                                            </select>
                                                        </div>
    
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="date_delivered">Fecha de Entrega</label>
                                                            <input type="date" class="form-control mt-1" id="date_delivered"
                                                                name="date_delivered" value="{{ $order->date_delivered }}" >
                                                        </div>
    
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="pay_method">Método de Pago</label>
                                                            <select class="form-control mt-1" id="pay_method" name="pay_method" >
                                                                <option value="cash" @if ($order->pay_method == 'cash') selected @endif>
                                                                    Efectivo</option>
                                                                <option value="credit_card" @if ($order->pay_method == 'credit_card') selected @endif>
                                                                    Tarjeta de Crédito</option>
                                                                <option value="debit_card" @if ($order->pay_method == 'debit_card') selected @endif>
                                                                    Tarjeta de Débito</option>
                                                            </select>
                                                        </div>
                                                            <button type="submit" class="btn btn-primary"> guardar</button>
                                                    </form>
    
                                                    <div class="row">
                                                        @foreach ($order->DetailOrder as $index => $detail)
                                                            <div class="col-md-6 mb-3">
                                                                <div class="card" style="width: 18rem;">
                                                                    <img src="{{ asset('storage/img/' . $detail->product->img) }}" class="card-img-top"
                                                                        alt="imagen de {{ $detail->product->name }}">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Detail: {{ $detail->product->name }}</h5>
                                                                        <p class="card-text">
                                                                            <b>precio:</b> {{ $detail->price }}<br>
                                                                            <strong>cantidad:</strong> {{ $detail->quantity }}
                                                                        </p>
                                                                        <form action="{{ route('detail_orders.destroy', ['id' => $detail->id]) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
    
                                                            @if (($index + 1) % 2 === 0 || $loop->last)
                                                                </div>
                                                                @if (!$loop->last)
                                                                    <div class="row">
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        @endif


                @endif



                @if (Auth::check() && Auth::user()->rol  == 'employee' )
    
                    <section class="bg-light">
                        <div class="container pb-5">
                            <div class="row">
                                <div class="col-lg-7 mt-5">
                                    <div class="card">
                                        <a href="{{route('orders.index')}}" class="btn btn-secundary">
                                            volver
                                        </a>
                                        <div class="card-body">
                                            <h1 class="h2"> Orden:</h1>
                                            <p>Ve la orden</p>
                                            

                                                <form class="col-md-9 m-auto" method="post" role="form">
                                                
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="client_id">Cliente</label>
                                                        <input type="text" class="form-control mt-1" id="client_id" name="client_id"
                                                            placeholder="Cliente" value="{{ $order->client->name }}" disabled>
                                                    </div>
                                                
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="user_id">Usuario</label>
                                                        <input type="text" class="form-control mt-1" id="user_id" name="user_id"
                                                            placeholder="Usuario"
                                                            value="{{ $order->user ? $order->user->name : 'none' }}"disabled>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="state">Estado</label>
                                                        <select class="form-control mt-1" id="state" name="state" disabled>
                                                            <option value="en espera"@if ($order->state = 'en espera') selected @endif>En
                                                                Espera</option>
                                                            <option value="cancelada"@if ($order->state = 'cancelada') selected @endif>
                                                                Cancelada</option>
                                                            <option value="aceptada" @if ($order->state = 'aceptada') selected @endif>
                                                                Aceptada</option>
                                                            <option value="entregada"@if ($order->state = 'entregada') selected @endif>
                                                                Entregada</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="date_delivered">Fecha de Entrega</label>
                                                        <input type="date" class="form-control mt-1" id="date_delivered"
                                                            name="date_delivered" value="{{ $order->date_delivered }}" disabled>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for="pay_method">Método de Pago</label>
                                                        <select class="form-control mt-1" id="pay_method" name="pay_method" disabled>
                                                            <option value="cash" @if ($order->pay_method == 'cash') selected @endif>
                                                                Efectivo</option>
                                                            <option value="credit_card" @if ($order->pay_method == 'credit_card') selected @endif>
                                                                Tarjeta de Crédito</option>
                                                            <option value="debit_card" @if ($order->pay_method == 'debit_card') selected @endif>
                                                                Tarjeta de Débito</option>
                                                        </select>
                                                    </div>

                                                </form>

                                                <div class="row">
                                                    @foreach ($order->DetailOrder as $index => $detail)
                                                        <div class="col-md-6 mb-3">
                                                            <div class="card" style="width: 18rem;">
                                                                <img src="{{ asset('storage/img/' . $detail->product->img) }}" class="card-img-top"
                                                                    alt="imagen de {{ $detail->product->name }}">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Detail: {{ $detail->product->name }}</h5>
                                                                    <p class="card-text">
                                                                        <b>precio:</b> {{ $detail->price }}<br>
                                                                        <strong>cantidad:</strong> {{ $detail->quantity }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if (($index + 1) % 2 === 0 || $loop->last)
                                                            </div>
                                                            @if (!$loop->last)
                                                                <div class="row">
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    </section>

                @endif

  


    @endsection
