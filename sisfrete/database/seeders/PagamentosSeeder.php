<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagamentosSeeder extends Seeder
{
    public function run()
    {
        DB::table('pagamentos')->insert([
            [
                'pedido_id' => 1,
                'valor' => 1525.00,
                'concluido' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 2,
                'valor' => 3000.00,
                'concluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 3,
                'valor' => 800.00,
                'concluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 4,
                'valor' => 50.00,
                'concluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
