<?php

use App\Entities\Order\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', Order::getStatuses());

            $table->bigInteger('user_id')->nullable();
            $table->string('email');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();

            $table->string('currency')->nullable();
            $table->string('comment')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->on('users')
                ->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
