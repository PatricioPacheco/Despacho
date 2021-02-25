<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empaques extends Model
{
    public function despachos()
    {
        return $this->hasMany(Despachos::class);
    }
}
