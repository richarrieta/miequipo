<?php

class FichasController extends BaseController {

    private $reporte;

    public function __construct(\ayudantes\Reporte $rep) {
        $this->reporte = $rep;
        parent::__construct();
    }

    public function getVer($id) {
        $data['ficha'] = Ficha::findOrFail($id);
        $data['jugador'] = $data['ficha']->getJugador();
        $data['representante'] = $data['ficha']->getRepresentante();
        $data['recaudos'] = $data['ficha']->recaudosFicha;
        $data['fotos'] = $data['ficha']->fotos;
        return View::make('fichas.planilla', $data);
    }

    public function getIndex() {
        $data['fichas'] = Ficha::eagerLoad()
                ->aplicarFiltro()
                ->ordenar();
        $data['fichas'] = $data['fichas']->paginate(5);
        //se usa para el helper de busqueda
        $data['persona'] = new Persona();
        $data['ficha'] = new Ficha();

        return View::make('fichas.index', $data);
    }

    public function postModificar() {
        Session::forget('ficha');
        $ficha = Ficha::findOrNew(Input::get('id'));
        $ficha->fill(Input::all());
        if ($ficha->save()) {
            $data['ficha'] = $ficha;
            $data['mensaje'] = "Datos guardados correctamente";
            if (Request::ajax()) {
                return Response::json($data);
            }
            return Redirect::to('fichas/modificar/' . $ficha->id);
        } else {
            if (Request::ajax()) {
                return Response::json(['errores' => $ficha->getErrors()], 400);
            }
            return Redirect::back()->withInput()->withErrors($ficha->getErrors());
        }
    }

    public function getModificar($id = null) {
        if (is_null($id) && !Session::has('ficha')) {
            $data['nuevo'] = true;
        } else {
            $data['nuevo'] = false;
        }
        if (Session::has('ficha') && is_null($id)) {
            $data['ficha'] = new Ficha(Session::get('ficha'));
        } else {
            $data['ficha'] = Ficha::findOrFail($id);
        }

        $data['jugador'] = Persona::findOrFail($data['ficha']->jugador_id);
        $data['representante'] = Persona::findOrNew($data['ficha']->representante_id);
//        $data['recaudo'] = new RecaudosFicha();
//        $data['recaudos'] = $data['ficha']->recaudosFicha;

        if (Request::ajax()) {
            return Response::json($data);
        }
        return View::make("fichas.plantilla", $data);
    }

    public function getNueva() {
        Session::forget('ficha');
        $data['nuevo'] = true;
        $data['ficha'] = new Ficha();
        $data['personaJugador'] = new Persona();
        $data['personaRepresentante'] = new Persona();
        return View::make("fichas.plantilla", $data);
    }

    public function postNueva() {
        $ficha = Ficha::crear(Input::all());
        if (!$ficha->hasErrors()) {
            Session::set('ficha', $ficha->toArray());
            return Redirect::to('fichas/modificar');
        } else {
            return Redirect::back()->withInput()->withErrors($ficha->getErrors());
        }
    }

    /* -------------------------------------------------------------------- */

    public function getPlanilla($id, $store = false) {
        $data['ficha'] = Ficha::findOrFail($id);
        $data['jugador'] = $data['ficha']->getJugador();
        $data['representante'] = $data['ficha']->getRepresentante();
        return $this->reporte->generar('fichas.imprimir', $data);
    }

    public function postSubirfoto($idPersona) {
        if (!Input::hasFile('file')) {
            return Response::json(array('error' => 'No hay ningun archivo'), 400);
        }
        $persona = Persona::findOrFail($idPersona);
        $file = Input::file('file');

        if (!in_array(strtolower($file->getClientOriginalExtension()), Persona::$extensionesImagenes)) {
            return Response::json(array('mensaje' => 'Archivo no permitido'), 400);
        }
        if ($file->getSize() > 1048576) {
            return Response::json(array('mensaje' => 'Archivo demasiado pesado, no puede superar 1MB de tamaño'), 400);
        }
        $fileName = 'Foto.' . $file->getClientOriginalExtension();

        $base_path = 'documentos' . DIRECTORY_SEPARATOR . 'PER' . $persona->id;

        $file->move($base_path, $fileName);
        $foto = PHPImageWorkshop\ImageWorkshop::initFromPath($base_path . DIRECTORY_SEPARATOR . $fileName);
        $foto->cropMaximumInPixel(0, 0, "MM");
        $foto->resizeInPixel(160, 160);
        $foto->save($base_path, $fileName);
        if ($persona->foto != "") {
            File::delete($base_path . $persona->foto);
        }
        $persona->foto = $fileName;
        $persona->save();
        return Response::json(array('url' => url($base_path . DIRECTORY_SEPARATOR . $fileName)));
    }

    public function cancelarTransaccion() {
        \DB::rollBack();
    }

    public function getAnular($id) {
        $data['ficha'] = Ficha::findOrFail($id);
        $data['bitacora'] = new Bitacora();
        return View::make('fichas.anular', $data);
    }

    public function getBitacora($id, $store = false) {
        $data['ficha'] = Ficha::findOrFail($id);
        return $this->reporte->generar('fichas.imprimirbitacora', $data);
    }

}
