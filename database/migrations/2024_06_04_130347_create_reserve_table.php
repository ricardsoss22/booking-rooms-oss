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
        Schema::create('reserve', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->foreignId('room_id')
                ->references('id')
                ->on('rooms');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->string('status')->default('pending');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('room_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rezervacijas');
    }
};
