<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            [
                'nombre' => 'ANZOATEGUI',
   
            ],
            [
                'nombre' => 'NUEVA ESPARTA',
       
            ],
            [
                'nombre' => 'MIRANDA',
        
            ],
            [
                'nombre' => 'TRUJILLO',
           
            ],
        ];

        foreach ($estados as $estado){
            Estado::create($estado);
        }
    }
}
