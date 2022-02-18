<?php

namespace Database\Seeders;

use App\Models\Tipo_ranurado;
use Illuminate\Database\Seeder;

class TipoRanuradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranurados = [
            [
                'nombre' => 'Múltiple',
   
            ],
            [
                'nombre' => 'Único corte',
       
            ],
        ];

        foreach ($ranurados as $ranurado){
            Tipo_ranurado::create($ranurado);
        }
    }
}
