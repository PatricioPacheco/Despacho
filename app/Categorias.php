<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Categorias as Authenticatable;


class Categorias extends Model

{

    public function Productos()
    {
        return $this->hasMany(Productos::class);
    }

   

}
