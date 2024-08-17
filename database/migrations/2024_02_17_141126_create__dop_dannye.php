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
        Schema::create('_dop_dannye', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('login_id');
            $table->string('имя');
            $table->string('Фамилия');
            $table->string('номер_телефона');
            $table->string('адресс');
            $table->string('дата_рождения');
            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('login_id')->references('id')->on('SignIn')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_dop_dannye');
    }
};
