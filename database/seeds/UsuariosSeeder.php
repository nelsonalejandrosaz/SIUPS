<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Admin', 'apellido' => 'Administrador', 'email' => 'admin@gmail.com', 'username' => 'admin', 'password' => bcrypt('password'), 'escuela_id' => '1',]);
    }
}
