<?php

use Illuminate\Database\Seeder;
use App\Estado;
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Estado::create(['codigo'=>'','nombre'=>'disponible']);
        Estado::create(['codigo'=>'','nombre'=>'en curso']);
        Estado::create(['codigo'=>'','nombre'=>'abandonado']);
    }
}
