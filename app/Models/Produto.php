<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nome',
        'custo',
    ];

    public function movimentos()
    {   // quer dizer que um produto tem muitos movimentos
    	return $this->hasMany(Movimento::class);
    }


}
