<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Http\Controllers\Controller;

class VeiculoController extends Controller
{
    // -------------------------------- CONSTRUCTOR --------------------------
    public function index(Request $request)
    {
        if ($request->has('proprietario_id')) {
            // Filtra os veículos pelo proprietario_id
            $veiculos = Veiculo::where('proprietario_id', $request->proprietario_id)->get();
        } else {
            // Retorna todos os veículos ordenados pelo nome do proprietário
            $veiculos = Veiculo::join('proprietarios', 'veiculos.proprietario_id', '=', 'proprietarios.id')
                ->orderBy('proprietarios.nome')
                ->select('veiculos.*', 'proprietarios.nome as nome_proprietario')
                ->get();
        }

        return response()->json($veiculos);
    }
    // -------------------------------- CREATE --------------------------
    public function store(Request $request)
    {
        $veiculo = Veiculo::create($request->all());
        return response()->json($veiculo, 201);
    }
    // -------------------------------- READ --------------------------
    public function show($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return response()->json($veiculo);
    }
    // ----------------------------- UPDATE ---------------------------
    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update($request->all());
        return response()->json($veiculo, 200);
    }
    // ----------------------------- DELETE ---------------------------
    public function destroy($id)
    {
        Veiculo::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
