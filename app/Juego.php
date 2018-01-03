<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $table='juegos';

    protected $fillable = [
    	'titulo',
    	'descripcion',
    	'precio',
        'imagen',
        'idCategoria',
        'idUsuario'
    ];
}
