<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasaJusticia extends Model
{
    use HasFactory;

    protected $table = 'casas_justicia';

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function cajas()
    {
        return $this->hasMany(Caja::class);
    }
}
