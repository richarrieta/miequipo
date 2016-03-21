<?php

class clubTableSeeder extends Seeder {

    public function run() {
        Club::create(array('nombre' => 'Junior Los Teques',
            'direccion_sede' => 'Universidad Catolica UCAB Los Teques',
            'ind_active' => '1'));
    }

}
