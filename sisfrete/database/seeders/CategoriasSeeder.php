<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'descricao' => 'Eletrônicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Livros',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Roupas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Alimentos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Móveis',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
