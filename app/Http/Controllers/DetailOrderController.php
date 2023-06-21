<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DetailOrder;
use App\Models\Order;

class DetailOrderController extends Controller
{

    public function index(string $orderId)
    {
       
        $order = Order::find($orderId);
        $detailOrders = $order->detailOrders;

        return view('detail_orders.index', ['detailOrders' => $detailOrders]);
    }

    public function create()
    {
        return view('detail_orders.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $detailOrder = new DetailOrder;
        $detailOrder->order_id = $request->input('order_id');
        $detailOrder->product_id = $request->input('product_id');
        $detailOrder->price = $request->input('price');
        $detailOrder->quantity = $request->input('quantity');
        $detailOrder->save();

        return redirect()->route('shop');
    }


    public function show(string $id)
    {
        $detailOrder = DetailOrder::find($id);

        return view('detail_orders.show', ['detailOrder' => $detailOrder]);
    }


    public function edit(string $id)
    {
        $detailOrder = DetailOrder::find($id);
        return view('detail_orders.edit', ['detailOrder' => $detailOrder]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([

            'price' => 'required',
            'quantity' => 'required',
        ]);

        $detailOrder = DetailOrder::find($id);
        $detailOrder->order_id = $request->input('order_id');
        $detailOrder->product_id = $request->input('product_id');
        $detailOrder->price = $request->input('price');
        $detailOrder->quantity = $request->input('quantity');
        $detailOrder->save();

        return redirect()->route('detail_orders.index')->with('success', 'Detail order updated successfully');
    }


    public function destroy(string $id)
    {
        $detailOrder = DetailOrder::find($id);
        $detailOrder->delete();

        return redirect()->route('orders.index')->with('success', 'Order delivered successfully');
    }
}
