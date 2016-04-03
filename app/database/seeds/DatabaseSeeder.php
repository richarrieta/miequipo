<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();
        $this->call('ConfiguracionSeeder');
        $this->call('ClubTableSeeder');
        $this->call('PosicionTableSeeder');
        $this->call('NivelAcademicoTableSeeder');
        $this->call('ParentescoTableSeeder');
        $this->call('RecaudoTableSeeder');
        $this->call('TipoNacionalidadTableSeeder');
        $this->call('EstadoCivilTableSeeder');
        $this->call('EstadoTableSeeder');
        $this->call('MunicipioTableSeeder');
        $this->call('ParroquiaTableSeeder');
        $this->call('UsersTableSeeder');
    }

}
