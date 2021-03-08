<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    public function organos()
    {
        return $this->belongsTo(Organo::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }
}
