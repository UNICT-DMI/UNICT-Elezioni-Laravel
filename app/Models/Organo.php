<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organo extends Model
{
    use HasFactory;

    public function schedes()
    {
        return $this->hasMany(Schede::class);
    }

    public function listas()
    {
        return $this->hasMany(Lista::class);
    }

    public function votantis()
    {
        return $this->hasMany(Votanti::class);
    }

    public function elettoris()
    {
        return $this->hasMany(Elettori::class);
    }
}
