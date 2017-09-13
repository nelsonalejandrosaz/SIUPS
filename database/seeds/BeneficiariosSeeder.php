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
        Beneficiario::create(['nombre' => 'bene1', 'apellido' => 'apel1', 'dui' => '12345678-0','correo'=>'b1@b1.com','telefono'=>'2201223','organizacion'=>'UES','telefonoOrganizacion'=>'2222222','correoOrganizacion'=>'coo@cc.com','direccionOrganizacion'=>'col miramonte']);
        
        Beneficiario::create(['nombre' => 'bene2', 'apellido' => 'apel1', 'dui' => '12345678-9','correo'=>'b1@b1.com','telefono'=>'2201223','telefonoOrganizacion'=>'2222222','correoOrganizacion'=>'coo@cc.com','direccionOrganizacion'=>'col miramonte']);
        
    }
}
