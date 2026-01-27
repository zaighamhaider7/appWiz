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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('subscription_tag');
            $table->decimal('price', 10, 2);
            $table->string('subscription_name');
            $table->string('tagline');
            $table->string('best_for');
            $table->foreignId('main_category')->constrained('subscription_categories')->onDelete('cascade');
            $table->integer('sub_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_subscriptions');
    }
};
