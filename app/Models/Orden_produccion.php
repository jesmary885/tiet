<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Orden_produccion extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion uno a muchos inversa
    public function suplidor(){
        return $this->belongsTo(Suplidor::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tipo_ranurado(){
        return $this->belongsTo(Tipo_ranurado::class);
    }

     //Relacion uno a muchos 

     public function operacions(){
        return $this->hasMany(Operacion::class);
    }

}
