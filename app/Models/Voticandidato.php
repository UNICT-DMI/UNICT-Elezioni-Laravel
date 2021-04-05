<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voticandidato extends Model
{
    use HasFactory;

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
