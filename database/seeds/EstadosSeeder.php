<?php

use Illuminate\Database\Seeder;
use App\Estado;

// Estos son los estados del SS

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['codigo'=>'DIS','nombre'=>'Disponible']);
        Estado::create(['codigo'=>'ECS','nombre'=>'En curso']);
        Estado::create(['codigo'=>'ABN','nombre'=>'Abandonado']);
        Estado::create(['codigo'=>'FIN','nombre'=>'Finalizado']);
        // Estado::create(['codigo'=>'ABN','nombre'=>'Abandonado']);
    }
}
