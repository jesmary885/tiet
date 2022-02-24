<?php

namespace Database\Seeders;

use App\Models\Almacen;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $almacenes = [
            [
                'nombre' => 'ALMACEN 1',
                'direccion' => 'Av. Falsa calle Nro xx',
            ],
            [
                'nombre' => 'ALMACEN 2',
                'direccion' => 'Av. Falsa calle Nro xx',
            ],
        ];

        foreach ($almacenes as $almacen){
            Almacen::create($almacen);
        }
    }
}
