<?php

class TipoCuotaTableSeeder extends Seeder {

    public function run() {
        $tipocuotas = array('Inscripcion','Mensualidad', 'Pago Liga', 'Cuota especial', 'Uniformes');
        foreach ($tipocuotas as $tipocuota) {
            TipoCuota::create(array('nombre' => $tipocuota));
        }
    }

}
