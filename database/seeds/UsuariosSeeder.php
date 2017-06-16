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
        User::create(['name' => 'Admin', 'apellido' => 'Administrador', 'email' => 'admin@gmail.com', 'username' => 'admin', 'password' => bcrypt('password'),]);
        User::create(['name' => 'Jefe', 'apellido' => 'UPS', 'email' => 'jefeups@gmail.com', 'username' => 'jefeups', 'password' => bcrypt('password'),]);
        User::create(['name' => 'Coordinador Sistemas', 'apellido' => 'Apellido', 'email' => 'coordinadorsistemas@gmail.com', 'username' => 'sistemassups', 'password' => bcrypt('password'), 'escuela_id' => '1',]);
        User::create(['name' => 'Coordinador Electrica', 'apellido' => 'Apellido', 'email' => 'coordinadorelectrica@gmail.com', 'username' => 'electricasups', 'password' => bcrypt('password'), 'escuela_id' => '2',]);
        User::create(['name' => 'Coordinador Industrial', 'apellido' => 'Apellido', 'email' => 'coordinadorindustrial@gmail.com', 'username' => 'industrialups', 'password' => bcrypt('password'), 'escuela_id' => '3',]);
        User::create(['name' => 'Coordinador Mecanica', 'apellido' => 'Apellido', 'email' => 'coordinadormecanica@gmail.com', 'username' => 'mecanicasups', 'password' => bcrypt('password'), 'escuela_id' => '4',]);
        User::create(['name' => 'Coordinador Civil', 'apellido' => 'Apellido', 'email' => 'coordinadorcivil@gmail.com', 'username' => 'civilsups', 'password' => bcrypt('password'), 'escuela_id' => '5',]);
        User::create(['name' => 'Coordinador Quimica y Alimentos', 'apellido' => 'Apellido', 'email' => 'coordinadorquimica@gmail.com', 'username' => 'quimicayalimentossups', 'password' => bcrypt('password'), 'escuela_id' => '6',]);
        User::create(['name' => 'Coordinador Artitectura', 'apellido' => 'Apellido', 'email' => 'coordinadorarquitectura@gmail.com', 'username' => 'arquitecturasups', 'password' => bcrypt('password'), 'escuela_id' => '8',]);
        User::create(['name' => 'Secretaria', 'apellido' => 'Apellido', 'email' => 'secretariaups@gmail.com', 'username' => 'secretariaups', 'password' => bcrypt('password'),]);
    }
}
