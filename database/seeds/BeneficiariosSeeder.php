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
        Beneficiario::create(['nombre' => 'Iker', 'apellido' => 'Casillas', 'dui' => '12345678-0','correo'=>'ik@algo.com','telefono'=>'2201223','organizacion'=>'Real Madrid','telefono_organizacion'=>'2222222','correo_organizacion'=>'coo@cc.com','direccion_organizacion'=>'col miramonte']);
        
        Beneficiario::create(['nombre' => 'Oliver', 'apellido' => 'Kann', 'dui' => '12345678-9','correo'=>'ok@algo.com','telefono'=>'2201223','organizacion'=>'Bayern','telefono_organizacion'=>'2222222','correo_organizacion'=>'coo@cc.com','direccion_organizacion'=>'col miramonte']);
        
        Beneficiario::create(['nombre' => 'Ronaldo', 'apellido' => 'Nazario', 'dui' => '12345678-4','correo'=>'rn@algo.com','telefono'=>'2201223','organizacion'=>'Brasil','telefono_organizacion'=>'2222222','correo_organizacion'=>'coo@cc.com','direccion_organizacion'=>'col miramonte']);
    }
}
