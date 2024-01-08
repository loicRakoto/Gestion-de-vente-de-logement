<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    use HasFactory;
    public $timestamps = false;

    // protected $fillable = ['Id_cli', 'Type_vente'];

    public function citee()
    {
        return $this->belongsTo(cite::class, 'Num_cite', 'Num_cite');
    }

    public function client()
    {
        return $this->belongsTo(client::class, 'Id_cli', 'Num_logement');
    }
}
