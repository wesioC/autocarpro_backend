<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class WelcomeController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('welcome', ['veiculos' => $veiculos]); // Certifique-se de passar a variável $veiculos para a view
    }
}
