<?php

class PersonasController extends BaseController {

    public function __construct() {
        parent::__construct();
    }
    
    public function getBuscarid($id) {
        $data['persona'] = Persona::findOrFail($id);
        return Response::json($data);
    }

    public function getBuscar() {
        $persona = Persona::findOrNewByCedula(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        $data['persona'] = $persona;
        return Response::json($data);
    }

    public function postCrear() {
        $persona = Persona::findOrNew(Input::get('id'));
        $persona->fill(Input::all());
        if ($persona->save()) {
            $data['persona'] = $persona;
            $data['mensaje'] = 'Datos guardados correctamente';            
            return Response::json($data);
        }
        return Response::json(['errores' => $persona->getErrors()], 400);
    }

    public function postModificar() {
        $persona = Persona::findOrNew(Input::get('id'));
        $persona->fill(Input::all());
        if ($persona->save()) {
            return Response::json(['persona' => $persona, 'mensaje' => 'Datos guardados correctamente']);
        }
        return Response::json(['errores' => $persona->getErrors()], 400);
    }

    public function getCopiar($jugador_id) {
        $data['vista'] = $this->getCopiarDireccion($jugador_id)->render();
        $data['mensaje'] = "Dirección copiada correctamente";
        return Response::json($data);
    }
    
    public function getCopiarDireccion($id) {
        $beneficiario = Persona::findOrFail($id);
        $data['jugador'] = $beneficiario;
        $data['representante'] = $beneficiario;
        return View::make('solicitudes.direccion-jugador', $data);
    }
}
