<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ClientesSeeder::class,
            PedidosSeeder::class,
            PagamentosSeeder::class,
            ProdutosSeeder::class,
            CategoriasSeeder::class,
            ProdutosCategoriasSeeder::class,
            PedidosProdutosSeeder::class,
        ]);

        DB::table('pedidos')->where('id', 1)->update(['pagamento_id' => 1]);
        DB::table('pedidos')->where('id', 2)->update(['pagamento_id' => 2]);
        DB::table('pedidos')->where('id', 3)->update(['pagamento_id' => 3]);
        DB::table('pedidos')->where('id', 4)->update(['pagamento_id' => 4]);
    }
}
