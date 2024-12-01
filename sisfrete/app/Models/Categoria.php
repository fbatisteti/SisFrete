<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'ativo'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produtos_categorias');
    }
}
