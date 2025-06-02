<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained()->onDelete('cascade'); // ID del pedido
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); // ID del producto
        $table->integer('quantity'); // Cantidad comprada
        $table->decimal('price', 10, 2); // Precio del producto en el momento de la compra
        $table->timestamps(); // Marcas de tiempo (created_at, updated_at)
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
