<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedressementTechnique extends Model
{
    use HasFactory;
    protected $fillable=["Employee","Action","Situation_actuelle","Budget","Unite","Pourcentage_avancement","Depense","Fin2022","Juin2022","Fin2023","Resultat_Attendu"];

}
