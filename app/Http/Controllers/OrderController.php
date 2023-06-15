<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $orders = $user->orders;

        return view('orders.index', ['orders' => $orders]);
    }


    public function create()
    {
        return view('orders.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'date_delivered' => 'required|date',
        ]);

        $order = new Order;
        $order->client_id = $request->input('client_id');
        $order->user_id = Auth::id();
        $order->state = 'en espera';
        $order->date_delivered = $request->input('date_delivered');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'A new order has been created');
    }


    public function show(string $id)
    {
        $order = Order::find($id);

        return view('orders.show', ['order' => $order]);
    }


    public function edit(string $id)
    {
        $order = Order::find($id);
        return view('orders.edit', ['order' => $order]);
    }


    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->client_id = $request->input('client_id');
        $order->date_delivered = $request->input('date_delivered');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }


    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'An order has been removed');
    }


    public function accepted(string $id)
    {
        $order = Order::find($id);
        $order->state = 'aceptada';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order accepted successfully');
    }


    public function canceled(string $id)
    {
        $order = Order::find($id);
        $order->state = 'cancelada';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order canceled successfully');
    }


    public function delivered(string $id)
    {
        $order = Order::find($id);
        $order->state = 'entregada';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order delivered successfully');
    }
}
