<?php

class TorneosController extends BaseController {

    public function getIndex() {
        $data['torneos'] = Torneo::all();
        return View::make('torneos.index', $data);
    }

}

