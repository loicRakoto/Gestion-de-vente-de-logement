<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['Nom_cli', 'Prenom_cli', 'Tel_cli', 'CIN_cli', 'Lieux_travail', 'Date_achat'];
}
