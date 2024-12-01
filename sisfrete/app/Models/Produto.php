<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'valor', 'ativo'];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'produtos_categorias');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos');
    }
}
