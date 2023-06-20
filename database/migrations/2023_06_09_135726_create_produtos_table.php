<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('nome');
            $table->decimal('preco', 10, 2);
            $table->string('marca');
            $table->string('genero');
            $table->longText('descricao');
            $table->string('calcado_material_externo')->nullable();
            $table->string('calcado_material_interno')->nullable();
            $table->string('calcado_material_solado')->nullable();
            $table->string('calcado_tipo_fechamento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
