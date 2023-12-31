<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('sign_in_id');
            $table->unsignedBigInteger('sign_in_id');
            $table->unsignedBigInteger('dish_id');
            $table->integer('quantity');
            $table->timestamps();


            //$table->foreign('sign_in_id')->references('id')->on('sign_ins');

        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
