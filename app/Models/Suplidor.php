<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplidor extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

     //Relacion uno a muchos 

     public function orden_produccions(){
        return $this->hasMany(Orden_produccion::class);
    }


}
