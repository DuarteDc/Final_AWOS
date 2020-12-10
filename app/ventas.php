<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    protected $tabla='ventas';
    protected $fillable=[ 'cantidad','producto_id','users_id'];
}
