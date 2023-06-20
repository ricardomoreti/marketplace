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
            $table->string('ncm')->nullable();
            $table->decimal('peso', 8, 3)->nullable();
            $table->decimal('largura', 8, 3)->nullable();
            $table->decimal('altura', 8, 3)->nullable();
            $table->decimal('comprimento', 8, 3)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
