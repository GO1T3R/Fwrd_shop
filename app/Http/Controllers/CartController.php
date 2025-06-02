<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Order; 
use App\Models\OrderItem;

class CartController extends Controller
{
    // Método para agregar productos al carrito
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            // Si el producto ya está en el carrito, actualizar la cantidad
            $cart[$id]['quantity'] += $request->input('quantity', 1);
        } else {
            // Si no está, agregar el producto al carrito
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->input('quantity', 1),
                'image' => $product->image
            ];
        }

        // Guardar el carrito en la sesión
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    // Método para mostrar el carrito
    public function index()
    {
        return view('cart.index', [
            'cart' => Session::get('cart', [])
        ]);
    }

    // Método para actualizar la cantidad de productos en el carrito
    public function update(Request $request, $id)
    {
        // Obtener el carrito actual de la sesión
        $cart = Session::get('cart', []);

        // Verificar si el producto está en el carrito
        if (isset($cart[$id])) {
            // Actualizar la cantidad del producto
            $cart[$id]['quantity'] = $request->input('quantity', 1);

            // Guardar el carrito actualizado en la sesión
            Session::put('cart', $cart);

            return redirect()->back()->with('success', 'Cantidad actualizada con éxito.');
        }

        // Si el producto no está en el carrito, mostrar un error
        return redirect()->back()->with('error', 'Producto no encontrado en el carrito.');
    }

    // Método para eliminar un producto del carrito
    public function remove($id)
    {
        // Obtener el carrito actual de la sesión
        $cart = Session::get('cart', []);

        // Verificar si el producto está en el carrito
        if (isset($cart[$id])) {
            // Eliminar el producto del carrito
            unset($cart[$id]);

            // Guardar el carrito actualizado en la sesión
            Session::put('cart', $cart);

            return redirect()->back()->with('success', 'Producto eliminado del carrito.');
        }

        // Si el producto no está en el carrito, mostrar un error
        return redirect()->back()->with('error', 'Producto no encontrado en el carrito.');
    }

    // Método para proceder con el pago (checkout)
    public function checkout(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para proceder con la compra.');
        }

        // Calcular el total del carrito
        $totalPrice = array_reduce(Session::get('cart', []), function($carry, $item) {
            return $carry + $item['price'] * $item['quantity'];
        }, 0);

        // Crear un nuevo pedido
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Crear los ítems del pedido
        foreach (Session::get('cart', []) as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        // Vaciar el carrito después de realizar el pedido
        $request->session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Pedido realizado con éxito.');
    }
}
