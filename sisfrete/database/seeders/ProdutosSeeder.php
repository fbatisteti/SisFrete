<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
{
    public function run()
    {
        DB::table('produtos')->insert([
            [
                'descricao' => 'Smartphone',
                'valor' => 1500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Notebook',
                'valor' => 3000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Camisa',
                'valor' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Livro de Ficção',
                'valor' => 25.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Mesa de Jantar',
                'valor' => 800.00,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
