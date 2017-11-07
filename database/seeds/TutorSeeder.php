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
        Tutor::create(['nombre' => 'Emilio Antonio', 'apellido' => 'Rivas Castro', 'carnet'=>'RC12334','dui' => '1234567890','correo'=>'b1@b1.com']);
        Tutor::create(['nombre' => 'Karina Maria', 'apellido' => 'Hernadez Guerra', 'carnet'=>'HG12334','dui' => '1234567880','correo'=>'b1@b1.com']);
    }
}
