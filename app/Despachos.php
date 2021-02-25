<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despachos extends Model
{
    public function empaques()
    {
        return $this->belongsTo(Empaques::class);
    }

}
