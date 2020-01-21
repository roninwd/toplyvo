<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicsTable extends Migration
{
    public function up(): void
    {
        Schema::create('characteristics', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('characteristics');
    }
}
