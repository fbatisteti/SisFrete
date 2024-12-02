<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosCategoriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('produtos_categorias')->insert([
            [
                'produto_id' => 1,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produto_id' => 2,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produto_id' => 3,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produto_id' => 4,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produto_id' => 5,
                'categoria_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
