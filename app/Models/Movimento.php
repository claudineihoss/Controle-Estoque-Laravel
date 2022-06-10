<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    public function produto(){
        // cada movimento pertence a um produto.
        return $this->belongsTo(Movimento::class);

    }

    
}
