<?php

use Illuminate\Database\Seeder;
use App\Estado_expediente;

// Este son los estados del expediente del estudiante

class Estado_expedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado_expediente::create(['nombre'=>'No abierto']);
        Estado_expediente::create(['nombre'=>'En curso']);
        Estado_expediente::create(['nombre'=>'Finalizado']);
    }
}
