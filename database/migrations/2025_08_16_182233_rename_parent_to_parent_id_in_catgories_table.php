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
    {Schema::enableForeignKeyConstraints();
        Schema::table('catgories', function (Blueprint $table) {
        //          $table->renameColumn('parint', 'parent_id');

        // // إذا تبغى تضيف قيد Foreign Key
        // $table->foreignId('parent_id')->constrained('catgories');
            //
        });Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catgories', function (Blueprint $table) {
            //
        });
    }
};
