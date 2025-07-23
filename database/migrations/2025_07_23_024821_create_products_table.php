<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;
use PHPUnit\Framework\Attributes\DisableReturnValueGenerationForTestDoubles;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('short_description')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('cost_price');
            $table->integer('purchase_price');
            $table->string('old_price',10)->nullable();
            $table->string('new_price',10);
            $table->binary('favorite')->default(0);
            $table->string('brand')->nullable();
            $table->enum('is_active', [1,0])->default(1);
          
            $table->integer('view')->default(0);
            $table->foreignId('catgorey_id')->constrained('catgories');
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes('deleted_at', precision: 0);
            $table->timestamps();
        });Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
