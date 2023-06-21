<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function index(Request $request)
    {


        $user = auth()->user();

        if ($user->rol == 'user') {
        $user = Auth::user();
        $client = Client::where('user_id', $user->id)->first();
        if ($client) {
            $orders = Order::where('client_id', $client->id)->get();
        } else {
            $orders = null;
        }
        
        return view('orders.index', compact('orders'));
        }
        if ($user->rol == 'employee') {
            $filter = $request->input('filter');
    
            if ($filter) {
                switch ($filter) {
                    case '1':
                        $orders = Order::where('state', 'en espera')->get();
                        break;
                    case '2':
                        $orders = Order::where('state', 'cancelada')->get();
                        break;
                    case '3':
                        $orders = Order::where('state', 'aceptada')->get();
                        break;
                    case '4':
                        $orders = Order::where('state', 'entregada')->get();
                        break;
                    default:
                        $orders = Order::whereNotNull('state')
                        ->get();
                        break;
                }
            } else {
                $orders = Order::whereNotNull('state')
                ->get();
            }
        
            return view('orders.index', ['orders' => $orders, 'filter' => $filter]);
        }
       
    }
 
   
    public function store(Request $request)
    {
        $user = Auth::user();
        $client = Client::where('user_id', $user->id)->first();

        if ($client) {
            $order = new Order();
            $order->client_id = $client->id;
            $order->date_delivered = $request->input('date_delivered');
            // $order->pay_method = $request->input('pay_method');
            $order->state = null;
            // Otros campos y lógica de validación aquí
            $order->save();

            // Redireccionar a la página de pedidos o mostrar un mensaje de éxito
            return redirect()->route('orders.index')->with('success', 'Pedido agregado exitosamente.');
        }

        // Redireccionar a la página de pedidos o mostrar un mensaje de error
        return redirect()->route('orders.index')->with('error', 'No se pudo agregar el pedido.');
    }


    public function edit(Order $order )
    {
        return view('orders.edit', ['order' => $order]);
    }
    public function show(Order $order )
    {
        return view('orders.show', ['order' => $order]);
    }


    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->date_delivered = $request->input('date_delivered');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }


    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'An order has been removed');
    }


    public function accepted(string $id)
    {
        $order = Order::find($id);
        $order->state = 'aceptada';
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order accepted successfully');
    }


    public function canceled(string $id)
    {
        $order = Order::find($id);
        $order->state = 'cancelada';
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order canceled successfully');
    }


    public function delivered(string $id)
    {
        $order = Order::find($id);
        $order->state = 'entregada';
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order delivered successfully');
    }
    public function deliver(Order $order)
    {
        $order->state = 'en espera';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order delivered successfully');
    }
}
