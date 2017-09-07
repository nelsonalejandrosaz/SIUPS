<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EscuelaSeeder::class);
         $this->call(RolSeeder::class);
         $this->call(UsuariosSeeder::class);
         $this->call(Rol_userSeeder::class);
         $this->call(DepartamentoSeeder::class);

    }
}
