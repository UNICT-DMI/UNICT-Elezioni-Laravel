<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votanti extends Model
{
    use HasFactory;

    public function organo()
    {
        return $this->belongsTo(Organo::class);
    }
}
