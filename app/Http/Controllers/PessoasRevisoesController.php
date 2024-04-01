<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoasRevisoesController extends Controller
{
    public function index()
    {
        // Consulta SQL para obter as pessoas com o maior número de revisões
        $pessoasComMaisRevisoes = DB::select("
            SELECT
                p.nome,
                COUNT(r.id) AS total_revisoes
            FROM
                proprietarios p
            INNER JOIN
                veiculos v ON p.id = v.proprietario_id
            INNER JOIN
                revisoes r ON v.id = r.veiculo_id
            GROUP BY
                p.nome
            ORDER BY
                total_revisoes DESC
            LIMIT 5
        ");

        return response()->json($pessoasComMaisRevisoes);
    }
}
