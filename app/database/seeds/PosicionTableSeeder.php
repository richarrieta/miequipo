<?php

class PosicionTableSeeder extends Seeder {

    public function run() {
        Posicion::create(array('nombre' => 'Delantero'));
        Posicion::create(array('nombre' => 'Lateral Derecho'));
        Posicion::create(array('nombre' => 'Lateral Izquierdo'));
        Posicion::create(array('nombre' => 'Defenza Central'));
    }

}
