<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFoto extends Model
{
    use HasFactory;

    protected $fillable=[
        'nome',
        'path',
        'produto_id'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
