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
            'genero' => 'Masculino',
            'descricao' => 'Sapato oxford social masculino em couro sintético marca Polo Plus.'
        ]);
    }
}
