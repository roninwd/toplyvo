<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductParametersTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_parameters', static function (Blueprint $table) {
            $table->bigInteger('product_id');
            $table->bigInteger('characteristic_id');
            $table->string('value');
            $table->primary(['product_id', 'characteristic_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_parameters');
    }
}
