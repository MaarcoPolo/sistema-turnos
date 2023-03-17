<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    public function casaJusticia()
    {
        return $this->belongsTo(CasaJusticia::class, 'casa_justicia_id');
    }

    public function prioridad()
    {
        return $this->belongsTo(prioridad::class, 'prioridad_id');
    }
}
