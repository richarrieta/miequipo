<?php

class NivelAcademicoTableSeeder extends Seeder {

    public function run() {
        NivelAcademico::create(array('nombre' => 'Básico', 'orden' => '1'));
        NivelAcademico::create(array('nombre' => 'Diversificado', 'orden' => '2'));
    }

}
