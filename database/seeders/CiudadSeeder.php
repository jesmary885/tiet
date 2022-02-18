<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudads = [
            [
                'nombre' => 'EL TIGRE',
                'estado_id' => '1',
   
            ],
            [
                'nombre' => 'SAN JOSE DE GUANIPA',
                'estado_id' => '1',
       
            ],
            [
                'nombre' => 'BARCELONA',
                'estado_id' => '1',
        
            ],
            [
                'nombre' => 'ANACO',
                'estado_id' => '1',
            ],
            [
                'nombre' => 'LA ASUNCIÓN',
                'estado_id' => '2',
   
            ],
            [
                'nombre' => 'PORLAMAR',
                'estado_id' => '2',
       
            ],
            [
                'nombre' => 'PAMPATAR',
                'estado_id' => '2',
        
            ],
            [
                'nombre' => 'JUAN GRIEGO',
                'estado_id' => '2',
            ],
            [
                'nombre' => 'LOS TEQUES',
                'estado_id' => '3',
   
            ],
            [
                'nombre' => 'PETARE',
                'estado_id' => '3',
       
            ],
            [
                'nombre' => 'CHARALLAVE',
                'estado_id' => '3',
        
            ],
            [
                'nombre' => 'CARACAS',
                'estado_id' => '3',
            ],
            [
                'nombre' => 'VALERA',
                'estado_id' => '4',
   
            ],
            [
                'nombre' => 'BOCONO',
                'estado_id' => '4',
       
            ],
            [
                'nombre' => 'TRUJILLO',
                'estado_id' => '4',
        
            ],
            [
                'nombre' => 'LA QUEBRADA',
                'estado_id' => '4',
            ],
        ];

        foreach ($ciudads as $ciudad){
            Ciudad::create($ciudad);
        }
    }
}
