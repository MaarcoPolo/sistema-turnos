<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    public function tipoTurno()
    {
        return $this->belongsTo(tipoTurno::class);
    }

    public function casaJusticia()
    {
        return $this->belongsTo(CasaJusticia::class);
    }

    public function prioridad()
    {
        return $this->belongsTo(prioridad::class, 'prioridad_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
