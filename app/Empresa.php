<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /**
     * Obtiene los empleados.
     */
    public function empleados()
    {
        return $this->hasMany('App\Empleado');
    }
}
