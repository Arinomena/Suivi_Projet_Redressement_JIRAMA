<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datas extends Model
{
    use HasFactory;

    protected $fillable= [
        'employee','action','situation_actuelle','budget_chiffre','budget_unite','avancement_actuel','debut','juin','fin','resultat_attendu'
    ];
}
