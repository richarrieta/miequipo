<?php

class RecaudoTableSeeder extends Seeder {

    public function run() {
        Recaudo::create(array('nombre' => 'Fotocopias de la cédula de identidad del representante',
            'descripcion' => 'Fotocopia de la cédula de identidad del representante',
            'ind_obligatorio' => '0',
            'ind_vence' => '0',
            'ind_active' => '1'));
        Recaudo::create(array('nombre' => 'Fotocopia de la cédula de identidad del jugador',
            'descripcion' => 'Fotocopia de la cédula de identidad del jugador',
            'ind_obligatorio' => '0',
            'ind_vence' => '0',
            'ind_active' => '1'));
        Recaudo::create(array('nombre' => 'Partida de nacimiento del jugador',
            'descripcion' => 'Partida de nacimiento del jugador',
            'ind_obligatorio' => '0',
            'ind_vence' => '0',
            'ind_active' => '1'));
        Recaudo::create(array('nombre' => 'Foto reciente tamaño carnet del representante',
            'descripcion' => 'Foto reciente tamaño carnet del representante',
            'ind_obligatorio' => '1',
            'ind_vence' => '0',
            'ind_active' => '1'));
        Recaudo::create(array('nombre' => 'Foto reciente tamaño carnet del jugador',
            'descripcion' => 'Foto reciente tamaño carnet del jugador',
            'ind_obligatorio' => '1',
            'ind_vence' => '0',
            'ind_active' => '1'));
    }

}
