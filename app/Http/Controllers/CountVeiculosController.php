<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountVeiculosController extends Controller
{
    public function index()
    {
        // Consulta SQL para obter o relatório
        $relatorio = DB::select("
            SELECT 
                p.sexo,
                COUNT(v.id) AS quantidade_carros
            FROM proprietarios p
            LEFT JOIN veiculos v ON p.id = v.proprietario_id
            GROUP BY p.sexo
        ");

        return response()->json($relatorio);
    }
}
