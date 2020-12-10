<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $tabla='productos';
    protected $fillable=[ 'nombre','costo','descuento'];
}
