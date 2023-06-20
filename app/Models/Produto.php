<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'nome',
        'preco',
        'marca',
        'genero',
        'descricao',
        'calcado_material_externo',
        'calcado_material_interno',
        'calcado_material_solado',
        'calcado_tipo_fechamento',
        'ncm',
        'peso',
        'largura',
        'altura',
        'comprimento'
    ];

    public function getProdutosPesquisarIndex(string $search = '')
    {
        $produto = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();

        return $produto;
    }
}
