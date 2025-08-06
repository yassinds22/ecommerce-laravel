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
        Schema::create('payments', function (Blueprint $table) {
           $table->id();
           $table->foreignId('order_id')->constrained()->onDelete('cascade');
           $table->enum('method', ['cash_on_delivery', 'credit_card', 'paypal'])->default('cash_on_delivery');
           $table->decimal('amount', 10, 2);
           $table->string('transaction_id')->nullable();
           $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
           $table->boolean('is_paid')->default(false);
           $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
