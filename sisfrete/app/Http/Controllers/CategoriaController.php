<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }
    
    public function ativar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update(["ativo" => 1]);
        return response()->json($categoria, 200);
    }

    public function inativar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update(["ativo" => 0]);
        return response()->json($categoria, 200);
    }

    public function destroy($id)
    {
        // IDEALMENTE, não se remove o registro do banco de dados
        // Categoria::destroy($id);
        // return response()->json(null, 204);

        // Então eu só vou inativar
        $categoria = Categoria::findOrFail($id);
        $categoria->update(["ativo" => 0]);
        return response()->json($categoria, 200);
    }
}
