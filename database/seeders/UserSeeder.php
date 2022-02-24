<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Angel',
            'apellido' => 'Maza',
            'email'=>'mazal@gmail.com',
            'cedula' => '17777777',
            'telefono' => '04141111111',
            'estado_id' => '1',
            'ciudad_id' => '1',
            'password'=>bcrypt('12345678'),
            'password_cifrada' => Crypt::encryptString('12345678'),

        ])->assignRole('Analista');

        User::create([
            'name'=>'Admin',
            'apellido' => 'Admin',
            'email'=>'admin@gmail.com',
            'cedula' => '1111111',
            'telefono' => '04141111110',
            'estado_id' => '1',
            'ciudad_id' => '1',
            'password'=>bcrypt('12345678'),
            'password_cifrada' => Crypt::encryptString('12345678'),

        ])->assignRole('Admin');
    }
}
