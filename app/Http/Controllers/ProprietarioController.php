<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProprietarioController extends Controller
{
    // -------------------------------- CONSTRUCTOR --------------------------
    public function index()
    {
        $proprietarios = Proprietario::all();
        return response()->json($proprietarios);
    }
    // -------------------------------- CREATE --------------------------
    public function store(Request $request)
    {
        $proprietario = Proprietario::create($request->all());
        return response()->json($proprietario, 201);
    }
    // -------------------------------- READ ---------------------------
    public function show($id)
    {
        $proprietario = Proprietario::findOrFail($id);
        return response()->json($proprietario);
    }
    // ----------------------------- UPDATE ------------------------
    public function update(Request $request, $id)
    {
        $proprietario = Proprietario::findOrFail($id);
        $proprietario->update($request->all());
        return response()->json($proprietario, 200);
    }
    //------------------------- DELETE -----------------------
    public function destroy($id)
    {
        Proprietario::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
