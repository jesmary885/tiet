<?php

namespace Database\Seeders;

use App\Models\Tipo_ranurado;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(CiudadSeeder::class);
       $this->call(UserSeeder::class);
        $this->call(SuplidorSeeder::class);
        $this->call(TipoRanuradoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(AlmacenSeeder::class);
    }
}
