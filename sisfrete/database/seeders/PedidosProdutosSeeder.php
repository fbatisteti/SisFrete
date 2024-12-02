<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosProdutosSeeder extends Seeder
{
    public function run()
    {
        DB::table('pedidos_produtos')->insert([
            [
                'pedido_id' => 1,
                'produto_id' => 1,
                'quantidade' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 1,
                'produto_id' => 4,
                'quantidade' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 2,
                'produto_id' => 2,
                'quantidade' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 2,
                'produto_id' => 3,
                'quantidade' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 3,
                'produto_id' => 5,
                'quantidade' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 4,
                'produto_id' => 3,
                'quantidade' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
