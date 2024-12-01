<?php

namespace App\Http\Controllers;

use App\Models\PedidosProduto;
use Illuminate\Http\Request;

class PedidosProdutoController extends Controller
{
    public function index()
    {
        $pedidosProdutos = PedidosProduto::all();
        return response()->json($pedidosProdutos);
    }

    // public function store(Request $request)
    // {
    //     $pedidoProduto = PedidosProduto::create($request->all());
    //     return response()->json($pedidoProduto, 201);
    // }

    public function show($id)
    {
        $pedidoProduto = PedidosProduto::find($id);
        return response()->json($pedidoProduto);
    }

    public function showByProduto($id)
    {
        $pedidoProduto = PedidosProduto::where('produto_id', $id)->get();
        return response()->json($pedidoProduto);
    }

    // public function update(Request $request, $id)
    // {
    //     $pedidoProduto = PedidosProduto::findOrFail($id);
    //     $pedidoProduto->update($request->all());
    //     return response()->json($pedidoProduto, 200);
    // }

    // public function destroy($id)
    // {
    //     PedidosProduto::destroy($id);
    //     return response()->json(null, 204);
    // }
}
