<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function agencess()
    {
        return $this->belongsTo(agence::class, 'Num_agence', 'Num_agence');
    }

    public function logemm()
    {
        return $this->hasMany(Logement::class, 'Num_cite', 'Num_logement');
    }
}
