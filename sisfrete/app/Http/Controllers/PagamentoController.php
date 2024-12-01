<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        $pagamentos = Pagamento::all();
        return response()->json($pagamentos);
    }

    public function store(Request $request)
    {
        $pagamento = Pagamento::create($request->all());
        return response()->json($pagamento, 201);
    }

    public function show($id)
    {
        $pagamento = Pagamento::find($id);
        return response()->json($pagamento);
    }

    public function update(Request $request, $id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->update($request->all());
        return response()->json($pagamento, 200);
    }

    public function pago($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->update(['concluido' => 1]);
        return response()->json($pagamento, 200);
    }

    public function pendente($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->update(['concluido' => 0]);
        return response()->json($pagamento, 200);
    }

    public function destroy($id)
    {
        // IDEALMENTE, não se remove o registro do banco de dados
        // Pagamento::destroy($id);
        // return response()->json(null, 204);

        // Então eu vou usar ATIVO = -1 para simular pagamentos apagados
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->update(['concluido' => -1]);
        return response()->json($pagamento, 200);
    }
}
