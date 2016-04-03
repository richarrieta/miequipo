<?php

class RecaudosFichaController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function postModificar() {
        $recaudoficha = RecaudosFicha::findOrFail(Input::get('id'));
        $recaudoficha->fill(Input::all());
        $recaudoficha->ind_recibido = true;
        if ($recaudoficha->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getModificar(null, $recaudoficha->ficha_id)->render();
            return Response::json($data);
        }
        return Response::json(['errores' => $recaudoficha->getErrors()], 400);
    }

    public function getModificar($recaudoFichaId = null, $ficha_id = null) {
        $data['recaudo'] = RecaudosFicha::findOrNew($recaudoFichaId);
        if ($recaudoFichaId == null) {
            $data['recaudos'] = Ficha::findOrFail(Input::get('ficha_id', $ficha_id))->recaudosFicha;
        } else {
            $data['recaudos'] = $data['recaudo']->ficha->recaudosFicha;
        }
        return View::make('fichas.recaudos', $data);
    }

    public function getDescargar($recaudoFichaId) {
        $recaudo = RecaudosFicha::findOrFail($recaudoFichaId);
        $path = storage_path('adjuntos' . DIRECTORY_SEPARATOR . $recaudo->ficha_id . DIRECTORY_SEPARATOR . $recaudo->documento);
        return Response::download($path);
    }

}
