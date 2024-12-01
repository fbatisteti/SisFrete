<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidosProduto;
use App\Models\Produto;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return response()->json($pedidos);
    }

    public function store(Request $request)
    {
        $produtos = $request->input('produtos');
        $valorTotal = $request->input('valor_total', 0);

        // se não veio um valor, calcular
        if ($valorTotal == 0) {
            $valorTotal = 0;
            foreach ($produtos as $produto) {
                $produtoDetalhes = Produto::find($produto['produto_id']);
                if ($produtoDetalhes) {
                    $valorTotal += $produtoDetalhes->valor * $produto['quantidade'];
                }
            }
        }

        $pedido = Pedido::create([
            'cliente_id' => $request->input('cliente_id'),
            'valor_total' => $valorTotal
        ]);        

        // insere equivalentes na Pedidos-Produtos
        foreach ($produtos as $produto) {
            PedidosProduto::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $produto['produto_id'],
                'quantidade' => $produto['quantidade']
            ]);
        }

        // cria um pagamento
        $pagamento = Pagamento::create([
            'pedido_id' => $pedido->id,
            'valor' => $valorTotal,
            'concluido' => 0
        ]);
        
        $pedido->update(['pagamento_id' => $pagamento->id]);

        return response()->json($pedido, 201);
    }

    public function show($id)
    {
        $pedido = Pedido::find($id);
        return response()->json($pedido);
    }

    // Para fins de simplificar, não vou adicionar produtos a um pedido depois que ele foi posto
    // public function update(Request $request, $id)
    // {
    //     $pedido = Pedido::findOrFail($id);
    //     $pedido->update($request->all());
    //     return response()->json($pedido, 200);
    // }

    public function destroy($id)
    {
        // IDEALMENTE, não se remove o registro do banco de dados
        // Mas eu considero que um pedido que deva ser cancelado por motivos que não FALTA DE PAGAMENTO pode ser removido

        // APENAS se não houver pagamentos referentes a este pedido
        $pagamentos = Pagamento::where('pedido_id', $id)->count();

        if ($pagamentos > 0) {
            return response()->json(['error' => 'Existem pagamentos associados a este pedido.'], 400);
        }

        // Remover os registros na tabela pedidos_produtos
        PedidosProduto::where('pedido_id', $id)->delete();

        Pedido::destroy($id);
        return response()->json(null, 204);
    }
}
