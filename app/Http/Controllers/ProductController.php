<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        // Obtener todos los productos desde la base de datos
        $products = Product::all();

        // Pasar los productos a la vista
        return view('comprar.playeras', compact('products'));
    }

    public function show($id)
    {
        // Obtener un producto específico por su ID
        $product = Product::findOrFail($id);

        // Pasar el producto a la vista
        return view('producto', compact('product'));
    }
    public function showRandomCarousel()
    {
        // Obtén todos los productos
    $products = Product::all();

    // Mezcla la colección de productos
    $products = $products->shuffle();

    // Selecciona la cantidad de productos que deseas mostrar, por ejemplo, 9
    $products = $products->take(9);

    // Retorna la vista con los productos mezclados

    return view('sugeration', compact('products'));
    }
}
