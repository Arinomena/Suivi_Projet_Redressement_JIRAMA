<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\RedressementFinancier;
use App\Models\RedressementTechnique;
use App\Models\RedressementCommercial;
use App\Models\ProjetsBailleurs;

class StatistiqueController extends Controller
{
    public function rechercher(Request $request)
    {
            $sheet=$request->input('feuille');
            session()->put('sheet',$sheet);
            $data=array();
            if($sheet=='RedressementFinancier'){
                $data=DB::select('SELECT distinct(Action),Situation_Actuelle,Budget,Depense,Pourcentage_avancement,Resultat_attendu from Redressement_Financiers');
                //dd('data');
            }elseif($sheet=='RedressementTechnique'){
                $data=DB::select('SELECT distinct(Action),Situation_Actuelle,Budget,Depense,Pourcentage_avancement,Resultat_attendu from Redressement_Techniques');
            }elseif($sheet=='RedressementCommercial'){
                $data=DB::select('SELECT distinct(Action),Situation_Actuelle,Budget,Depense,Pourcentage_avancement,Resultat_attendu from Redressement_Commercials');
            }elseif($sheet=='ProjetsBailleurs'){
                $data=DB::select('SELECT distinct(Action),Situation_Actuelle,Budget,Depense,Pourcentage_avancement,Resultat_attendu from Projets_Bailleurs');
            }

            //dd($data);
            return View('statistique', compact('data'));
    }

}
