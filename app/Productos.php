<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model

{
        public function categoria()
        {
            $this->BelongsTo(Categorias::class);
        }

     


        
}
