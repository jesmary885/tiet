<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                'nombre' => 'PEDRO',
                'apellido' => 'RODRIGUEZ',
                'email' => 'pedror@gmail.com',
                'cedula' => '15111111',
                'direccion' => 'Av. Falsa calle Nro xx',
                'telefono' => '04145895555',
                'estado_id' => '1',
                'ciudad_id' => '1',
   
            ],
            [
                'nombre' => 'MARIA',
                'apellido' => 'LOPEZ',
                'email' => 'marial@gmail.com',
                'direccion' => 'Av. Falsa calle Nro xx',
                'cedula' => '18555888',
                'telefono' => '04145895458',
                'estado_id' => '1',
                'ciudad_id' => '2',
   
            ],
        ];

        foreach ($clientes as $cliente){
            Cliente::create($cliente);
        }
    }
}
