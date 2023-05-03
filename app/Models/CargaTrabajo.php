<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaTrabajo extends Model
{
    use HasFactory;

    protected $table = 'carga_trabajo';

    public function tipo_turno()
    {
        return $this->belongsTo(tipoTurno::class, 'tipo_turno_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function casaJusticia()
    {
        return $this->belongsTo(CasaJusticia::class, 'casa_justicia_id');
    }
}
