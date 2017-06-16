<?php

use Illuminate\Database\Seeder;
Use App\rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rol::create(['nombre' => 'admin',]);
        rol::create(['nombre' => 'jefe',]);
        rol::create(['nombre' => 'coordinador_Sups',]);
        rol::create(['nombre' => 'secretaria',]);
    }
}
