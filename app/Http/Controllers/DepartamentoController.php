<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller{
    public function api_departamento($id){
        $data = Departamento::where('country_id', '=', $id)->get();
        return response()->json($data);
    }
}
