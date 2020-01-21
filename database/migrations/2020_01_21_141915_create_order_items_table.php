<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->integer('count');
            $table->integer('price');

            $table->foreign('order_id')
                ->on('orders')
                ->references('id')
                ->onDelete('CASCADE');

            $table->foreign('product_id')
                ->on('products')
                ->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
}
