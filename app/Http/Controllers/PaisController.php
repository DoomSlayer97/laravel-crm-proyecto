<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    
    public function getPaises() {
        return Pais::all();
    }

    public function getPais($id) {
        return Pais::find($id);
    }

    public function crearPais() {
    
        $params = request() -> all();

        $validacion = validator() -> make($params, [
            'nombre'                =>              'required|string|unique:pais'
        ]);

        //validacion si falla el validator
        if($validacion -> fails()) return response() -> json([
            'status'            =>          false,
            'errores'           =>          $validacion -> errors()
        ],501);

        $objPais = new Pais();
        $objPais -> nombre = $params['nombre'];

        $res = $objPais -> save();
       
        if(!$res) return response() -> json([
            'status'                =>              false,
            'message'               =>              'No se pudo guardar'
        ],404); 

        return response() -> json([
            'status'                =>              true,
            'message'               =>              'Pais creado',
            'pais'                  =>              $objPais
        ]);

    }

    public function editarPais() {

        $params = request() -> all();

        $validacion = validator() -> make($params, [
            'nombre'                =>              'required|string',
            'id'                    =>              'required'
        ]);

        //validacion si falla el validator
        if($validacion -> fails()) return response() -> json([
            'status'            =>          false,
            'errores'           =>          $validacion -> errors()
        ],501);

        $objPais = Pais::find($params['id']);
        $objPais -> nombre = $params['nombre'];

        $res = $objPais -> save();
       
        if(!$res) return response() -> json([
            'status'                =>              false,
            'message'               =>              'No se pudo guardar'
        ],404); 

        return response() -> json([
            'status'                =>              true,
            'message'               =>              'Pais modificado',
            'pais'                  =>              $objPais
        ]);

    }

    public function eliminarPais() {

        $params = request() -> all();

        if(!isset($params['id'])) return response() -> json([
            'status'            =>          false,
            'message'           =>          'Parametro no recibido'  
        ],403);
        
        $objPais = Pais::find($params['id']);
        
        $res = $objPais -> delete();
        
        if(!$res) return response() -> json([
            'status'                =>          false,
            'message'               =>          'No se pudo eliminar'
        ],404);

        return response() -> json([
            'status'                =>          true,
            'message'               =>          'El proyecto se elimino',
            'pais'                  =>          $objPais,   
        ]);

    }

}
