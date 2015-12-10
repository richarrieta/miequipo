<?php

class UsersTableSeeder extends Seeder {

    public function run() {

        Sentry::createUser(array(
            'email' => 'miequipo@gmail.com',
            'nombre' => 'Administrador de mi Equipo',
            'password' => '123456',
            'activated' => true,
        ));
    }

}
