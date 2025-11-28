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
        Schema::create('products', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->timestamps();
            $table->integer('price');
            $table->integer('quantity');
            $table->string('brand');
            $table->string('description');
            $table->integer('size');
            $table->string('sch');
            $table->string('hs_code');
            $table->string('country_origin');
            $table->string('material_family');
            $table->boolean('sni_required')->default(false);
            $table->string('size_category');
            $table->boolean('lartas_required')->default(false);
            $table->enum('type', ['Materials', 'Chemicals', 'Raw Parts', 'Consumables']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
