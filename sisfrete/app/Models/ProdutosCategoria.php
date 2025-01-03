<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosCategoria extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'categoria_id'];
}
