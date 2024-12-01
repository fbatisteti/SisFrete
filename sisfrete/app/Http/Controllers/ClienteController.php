<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente, 200);
    }

    public function ativar($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update(['ativo' => 1]);
        return response()->json($cliente, 200);
    }

    public function inativar($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update(['ativo' => 0]);
        return response()->json($cliente, 200);
    }

    public function destroy($id)
    {
        // IDEALMENTE, não se remove o registro do banco de dados
        // Cliente::destroy($id);
        // return response()->json(null, 204);

        // Então eu só vou inativar
        $cliente = Cliente::findOrFail($id);
        $cliente->update(["ativo" => 0]);
        return response()->json($cliente, 200);
    }
}
