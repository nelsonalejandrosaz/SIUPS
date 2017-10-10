<?php

use Illuminate\Database\Seeder;
use App\Modalidad;

class ModalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::create(['nombre' => 'Proyecto']);
        Modalidad::create(['nombre' => 'Curso Propedeutivo']);
        Modalidad::create(['nombre' => 'Ayudantia']);
        Modalidad::create(['nombre' => 'Pasantia Social']);
    }
}
