<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    public function run(): void
    {
        Produto::create([
            'sku' => 'OXFORD01',
            'nome' => 'Sapato Oxford Masculino',
            'preco' => '89.90',
            'marca' => 'Polo Plus',
            'genero' => 'masculino',
            'descricao' => 'Sapato oxford social masculino em couro sintético marca Polo Plus.',
            'calcado_material_externo' => 'Couro Sintético',
            'calcado_material_interno' => 'Têxtil',
            'calcado_material_solado' => 'TR',
            'calcado_tipo_fechamento' => 'Cadarço',
            'ncm' => '6404.20.00',
            'peso' => '1.00',
            'largura' => '33.5',
            'altura' => '12.0',
            'comprimento' => '19.0'
        ]);
    }
}
