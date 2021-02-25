<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model

{



    protected $fillable = [
        'stock_producto',
    ];


        public function categoria()
        {
            $this->BelongsTo(Categorias::class);
        }

     


        
}
