<?php

use Illuminate\Database\Seeder;
use App\Beneficiario;

class BeneficiariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beneficiario::create(['nombre' => 'bene1', 'apellido' => 'apel1', 'dui' => '12345678-0','correo'=>'b1@b1.com','telefono'=>'2201223','organizacion'=>'UES','telefono_organizacion'=>'2222222','correo_organizacion'=>'coo@cc.com','direccion_organizacion'=>'col miramonte']);
        
        Beneficiario::create(['nombre' => 'bene2', 'apellido' => 'apel1', 'dui' => '12345678-9','correo'=>'b1@b1.com','telefono'=>'2201223','telefono_organizacion'=>'2222222','correo_organizacion'=>'coo@cc.com','direccion_organizacion'=>'col miramonte']);
        
    }
}
