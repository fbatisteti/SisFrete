<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'valor_total', 'pagamento_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedidos_produtos');
    }
}
