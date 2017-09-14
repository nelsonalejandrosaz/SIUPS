<?php

use Illuminate\Database\Seeder;
use App\Estado_expediente;

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
        Estado_expediente::create(['nombre'=>'Disponible']);
        Estado_expediente::create(['nombre'=>'Finalizado']);
    }
}
