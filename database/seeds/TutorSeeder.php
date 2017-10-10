<?php

use Illuminate\Database\Seeder;
use App\Tutor;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tutor::create(['nombre' => 'tutor 1', 'apellido' => 'apel1', 'carnet'=>'va12334','dui' => '1234567890','correo'=>'b1@b1.com']);
        Tutor::create(['nombre' => 'tutor 2', 'apellido' => 'apel1', 'carnet'=>'va12334','dui' => '1234567880','correo'=>'b1@b1.com']);
    }
}
