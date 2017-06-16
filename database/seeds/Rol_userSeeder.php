<?php

use Illuminate\Database\Seeder;
Use App\rol_user;

class Rol_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rol_user::create(['user_id' => '1','rol_id' => '1',]);
        rol_user::create(['user_id' => '2','rol_id' => '2',]);
        rol_user::create(['user_id' => '3','rol_id' => '3',]);
        rol_user::create(['user_id' => '4','rol_id' => '3',]);
        rol_user::create(['user_id' => '5','rol_id' => '3',]);
        rol_user::create(['user_id' => '6','rol_id' => '3',]);
        rol_user::create(['user_id' => '7','rol_id' => '3',]);
        rol_user::create(['user_id' => '8','rol_id' => '3',]);
        rol_user::create(['user_id' => '9','rol_id' => '3',]);
        rol_user::create(['user_id' => '10','rol_id' => '4',]);
    }
}
