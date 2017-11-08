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
        Tutor::create(['nombre' => 'James Antonio', 'apellido' => 'Rodriguez', 'carnet'=>'JR12334','dui' => '12345678-1','correo'=>'b1@b1.com']);
        Tutor::create(['nombre' => 'Toni Abilio', 'apellido' => 'Kross', 'carnet'=>'TK12334','dui' => '12345678-2','correo'=>'b1@b1.com']);
        Tutor::create(['nombre' => 'Robert Alex', 'apellido' => 'Lewandowski', 'carnet'=>'TK12334','dui' => '12345678-3','correo'=>'b1@b1.com']);
    }
}
