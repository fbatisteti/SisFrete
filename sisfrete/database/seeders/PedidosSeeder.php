<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosSeeder extends Seeder
{
    public function run()
    {
        DB::table('pedidos')->insert([
            [
                'cliente_id' => 1,
                'valor_total' => 1525.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cliente_id' => 2,
                'valor_total' => 3050.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cliente_id' => 3,
                'valor_total' => 800.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cliente_id' => 4,
                'valor_total' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
