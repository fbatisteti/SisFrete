<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // public function index()
    // {
    //     $produtos = Produto::all();
    //     return response()->json($produtos);
    // }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    public function show($id)
    {
        $produto = Produto::find($id);
        return response()->json($produto);
    }

    public function filtrar(Request $request)
    {
        $query = Produto::query();

        if ($request->has('descricao')) {
            $query->where('descricao', 'like', '%' . $request->input('descricao') . '%');
        }

        if ($request->has('preco_min')) {
            $query->where('valor', '>=', $request->input('preco_min'));
        }

        if ($request->has('preco_max')) {
            $query->where('valor', '<=', $request->input('preco_max'));
        }

        if ($request->has('categoria')) {
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('descricao', 'like', '%' . $request->input('categoria') . '%');
            });
        }

        $produtos = $query->get();
        return response()->json($produtos);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto, 200);
    }

    public function ativar($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update(['ativo' => 1]);
        return response()->json($produto, 200);
    }

    public function inativar($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update(['ativo' => 0]);
        return response()->json($produto, 200);
    }

    public function destroy($id)
    {
        // IDEALMENTE, não se remove o registro do banco de dados
        // Produto::destroy($id);
        // return response()->json(null, 204);

        // Então eu só vou inativar
        $produto = Produto::findOrFail($id);
        $produto->update(['ativo' => 0]);
        return response()->json($produto, 200);
    }
}
