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
    {@Schema::enableForeignKeyConstraints();
        Schema::create('supplier_products', function (Blueprint $table) {
            $table->id();
          $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
    $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });@Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_products');
    }
};
