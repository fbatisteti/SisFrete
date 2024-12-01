<?php

namespace App\Http\Controllers;

use App\Models\ProdutosCategoria;
use Illuminate\Http\Request;

class ProdutosCategoriaController extends Controller
{
    public function index()
    {
        $produtosCategorias = ProdutosCategoria::all();
        return response()->json($produtosCategorias);
    }

    public function store(Request $request)
    {
        $produtoCategoria = ProdutosCategoria::create($request->all());
        return response()->json($produtoCategoria, 201);
    }

    public function storeMultiple(Request $request)
    {
        $dados = $request->all();
        $response = [];

        foreach ($dados as $data)
        {
            $produtoCategoria = ProdutosCategoria::create($data);
            $response[] = $produtoCategoria;
        }
        
        return response()->json($response, 201);
    }

    // public function show($id)
    // {
    //     $produtoCategoria = ProdutosCategoria::find($id);
    //     return response()->json($produtoCategoria);
    // }

    public function showByProduto($id)
    {
        $categorias = ProdutosCategoria::where('produto_id', $id)->get();
        return response()->json($categorias);
    }
    
    public function showByCategoria($id)
    {
        $produtos = ProdutosCategoria::where('categoria_id', $id)->get();
        return response()->json($produtos);
    }

    // public function update(Request $request, $id)
    // {
    //     $produtoCategoria = ProdutosCategoria::findOrFail($id);
    //     $produtoCategoria->update($request->all());
    //     return response()->json($produtoCategoria, 200);
    // }

    public function destroy($id)
    {
        ProdutosCategoria::destroy($id);
        return response()->json(null, 204);
    }
}
