<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountMarcasController extends Controller
{
    public function index()
    {
        // Consulta SQL para obter as marcas com o maior número de revisões
        $marcasComMaisRevisoes = DB::select("
            SELECT
                v.marca,
                COUNT(r.id) AS total_revisoes
            FROM
                veiculos v
            INNER JOIN
                revisoes r ON v.id = r.veiculo_id
            GROUP BY
                v.marca
            ORDER BY
                total_revisoes DESC
            LIMIT 5
        ");

        return response()->json($marcasComMaisRevisoes);
    }
}
