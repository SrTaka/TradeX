<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stock_data', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->decimal('open', 10, 2);
            $table->decimal('high', 10, 2);
            $table->decimal('low', 10, 2);
            $table->decimal('close', 10, 2);
            $table->decimal('volume', 20, 2);
            $table->date('date');
            $table->timestamps();

            $table->unique(['symbol', 'date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_data');
    }
}; 