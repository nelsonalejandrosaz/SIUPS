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
    }
}
