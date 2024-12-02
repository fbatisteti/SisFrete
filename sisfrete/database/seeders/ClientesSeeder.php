<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'João',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Maria',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Fulano',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Siclano',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Beltrano',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
