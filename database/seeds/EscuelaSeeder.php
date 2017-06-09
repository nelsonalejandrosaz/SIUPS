<?php

use Illuminate\Database\Seeder;
use App\Escuela;

class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuela::create(['codigo' => 'I10515', 'nombre' => 'Sistemas Informaticos']);
        Escuela::create(['codigo' => 'I10504', 'nombre' => 'Electrica']);
        Escuela::create(['codigo' => 'I10502', 'nombre' => 'Industrial']);
        Escuela::create(['codigo' => 'I10503', 'nombre' => 'Mecanica']);
        Escuela::create(['codigo' => 'I10501', 'nombre' => 'Civil']);
        Escuela::create(['codigo' => 'I10506', 'nombre' => 'Quimica']);
        Escuela::create(['codigo' => 'I10511', 'nombre' => 'Alimentos']);
        Escuela::create(['codigo' => 'A10507', 'nombre' => 'Arquitectura']);
    }
}
