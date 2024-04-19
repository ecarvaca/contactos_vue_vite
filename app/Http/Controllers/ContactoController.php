<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Exception;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function index(){
        try{
            $contactos = Contacto::orderBy('id','asc')->get();

            $response = ['contactos' => $contactos];
            return Response()->json($response, 200);
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function store(Request $request){
        try{
            $input = $request->all();

            Contacto::create($input);

            $response = [
                'message' => "Se ha guardado correctamente"
            ];

            return Response()->json($response, 201);
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function update(Request $request, $id){
        try{
            $input = $request->all();

            $contacto = Contacto::findOrFail($id);

            $contacto->nombres = $input['nombres'];
            $contacto->apellidos = $input['apellidos'];
            $contacto->correo = $input['correo'];

            $contacto->update();

            $response = [
                'message' => "Se ha editado correctamente"
            ];

            return Response()->json($response, 201);
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function getById(Request $request, $id){
        try{
            $contacto = Contacto::where('id',$id)->first();

            $response = ['contacto' => $contacto];
            return Response()->json($response, 200);
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
}
