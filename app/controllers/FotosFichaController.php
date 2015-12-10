<?php

class FotosFichaController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function deleteFoto() {
        $foto = FotoFicha::findOrFail(Input::get('id'));
        $ficha_id = $foto->ficha_id;
        $foto->delete();
        $data['mensaje'] = "Se eliminó la foto correctamente";
        $data['vista'] = $this->getModificar(null, $ficha_id)->render();
        return Response::json($data);
    }

    public function postModificar() {
        $fotoFicha = Fotoficha::findOrNew(Input::get('id'));
        $fotoFicha->fill(Input::all());
        if ($fotoFicha->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getModificar(null, $fotoFicha->ficha_id)->render();
            return Response::json($data);
        }
        return Response::json(['errores' => $fotoFicha->getErrors()], 400);
    }

    public function getModificar($foto_id = null, $ficha_id = null) {
        $data['foto'] = FotoFicha::findOrNew($foto_id);
        if ($foto_id == null) {
            $data['ficha'] = Ficha::findOrFail(Input::get('ficha_id', $ficha_id));
            $data['fotos'] = $data['ficha']->fotos;
        } else {
            $data['fotos'] = $data['foto']->ficha->fotos;
            $data['ficha'] = $data['foto']->ficha;
        }
        return View::make('fichas.galeriafotos', $data);
    }

    public function getDescargar($foto_id) {
        $foto = FotoFicha::findOrFail($foto_id);
        $path = storage_path('adjuntos' . DIRECTORY_SEPARATOR . $foto->ficha_id . DIRECTORY_SEPARATOR . $foto->foto);

        $length = filesize($path);
        $file = new Symfony\Component\HttpFoundation\File\File($path);

        $headers = array(
            'Content-Disposition' => 'inline; filename="' . $foto->foto . '"',
            'Content-Type' => $file->getMimeType(),
            'Content-Length' => $length,
        );
        return Response::make(File::get($path), 200, $headers);
    }

}
