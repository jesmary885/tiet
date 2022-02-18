<?php

namespace Database\Seeders;

use App\Models\Suplidor;
use Illuminate\Database\Seeder;

class SuplidorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suplidor::create([
            'nombre'=>'MERCADO B2B',
            'email'=>'mercadob2b@gmail.com',
            'rif' => 'J17856888',
            'telefono' => '04142222222',
            'direccion' => 'Avenida principal, edificio xx',
        ]);
    }
}
