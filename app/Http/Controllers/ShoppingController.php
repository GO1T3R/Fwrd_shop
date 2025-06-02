<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus pedidos.');
        }

        $user = Auth::user();
        $orders = $user->orders; // Aquí accedes a los pedidos del usuario

        return view('orders.index', compact('orders'));
    }

    public function placeOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return redirect()->route('orders.show', $order->id)->with('success', 'Pedido realizado con éxito.');
    }

}
