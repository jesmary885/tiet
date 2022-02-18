<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'estado_id'];

     //Relacion uno a muchos 

    public function clientes(){
        return $this->hasMany(Cliente::class);
    }

    //Relacion uno a muchos inversa
    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
