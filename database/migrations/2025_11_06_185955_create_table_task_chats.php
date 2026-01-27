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
        Schema::create('task_chats', function (Blueprint $table) {
            $table->id();
            $table->integer('task_id')->references('id')->on('table_task_managment')->onDelete('cascade');
            $table->integer('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->String('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_task_chats');
    }
};
