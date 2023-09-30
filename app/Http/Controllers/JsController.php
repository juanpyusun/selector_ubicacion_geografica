<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Ciudad;

class JsController extends Controller
{
    public function index(){
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();        
        return view('index', ['paises' => $paises, 'departamentos'=> $departamentos, 'ciudades'=> $ciudades]);
    }
    public function api_departamento(Request $request){
        $departamentos = Departamento::where('id_pais', '=', $request->id)->first();
        return response()->json($departamentos);
    }   

}
