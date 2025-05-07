<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('watchlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('watchlist_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('watchlist_id')->constrained()->onDelete('cascade');
            $table->string('symbol');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('watchlist_stocks');
        Schema::dropIfExists('watchlists');
    }
}; 