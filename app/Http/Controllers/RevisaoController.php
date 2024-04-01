<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revisao;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RevisaoController extends Controller
{
    // -------------------------------- CONSTRUCTOR --------------------------
    public function index(Request $request)
    {
        $revisoes = Revisao::query();

        // Verifica se foi fornecido um veiculo_id na query string
        if ($request->has('veiculo_id')) {
            // Filtra as revisões pelo veiculo_id
            $revisoes = Revisao::where('veiculo_id', $request->veiculo_id)->get();
        } elseif ($request->has('proximas')) {
            $revisoes = DB::select('
                SELECT r.*, v.marca, v.modelo, v.ano, p.nome as nome_proprietario
                FROM revisoes r
                JOIN veiculos v ON r.veiculo_id = v.id
                JOIN proprietarios p ON v.proprietario_id = p.id
                WHERE r.data_revisao > CURDATE()
                ORDER BY r.data_revisao
                LIMIT 5
            ');
        } elseif ($request->has('hoje')) {
            $revisoes = DB::select('
                SELECT r.*, v.marca, v.modelo, v.ano, p.nome as nome_proprietario
                FROM revisoes r
                JOIN veiculos v ON r.veiculo_id = v.id
                JOIN proprietarios p ON v.proprietario_id = p.id
                WHERE DATE(r.data_revisao) = CURDATE()
                ORDER BY r.data_revisao
            ');
        } else {
            // Se nenhum parâmetro for fornecido, retorna todas as revisões
            $revisoes = $revisoes->get();
        }

        return response()->json($revisoes);
    }



    // -------------------------------- CREATE ------------------------
    public function store(Request $request)
    {
        $revisao = Revisao::create($request->all());
        return response()->json($revisao, 201);
    }
    // -------------------------------- READ ---------------------------
    public function show($id)
    {
        $revisao = Revisao::findOrFail($id);
        return response()->json($revisao);
    }
    // ----------------------------- UPDATE ----------------------------
    public function update(Request $request, $id)
    {
        $revisao = Revisao::findOrFail($id);
        $revisao->update($request->all());
        return response()->json($revisao, 200);
    }
    // ----------------------------- DELETE ----------------------------
    public function destroy($id)
    {
        Revisao::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
