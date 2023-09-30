<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller{
    public function api_ciudad($id){
        $data = Ciudad::where('state_id', '=',$id)->get();
        return response()->json($data);
    }
    public function api_mapa($id){
        $data = Ciudad::where('id', '=',$id)->first();
        return response()->json($data);        
    }
}
