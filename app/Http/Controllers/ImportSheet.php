<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Datas;
use App\Imports\fileImport;
use App\Imports\importRF;
use App\Imports\importRT;
use App\Imports\importPB;
use App\Models\RedressementFinancier;
use App\Models\RedressementTechnique;
use App\Models\RedressementCommercial;
use App\Models\ProjetsBailleurs;
use App\Models\HistoriqueRole;
use App\Models\direction;

use Illuminate\Http\Request;

class ImportSheet extends Controller
{
    public function index(){
        /*$data=array();
        $historique= HistoriqueRole::all();
        $direction= direction::all();
        $role=null;
        $data['role']=$role;
        $data['historique']=$historique;
        $data['direction']=$direction;
        return View('choixRole',compact('data'));*/
        return View('welcome');
    }

    public function import(Request $request){
        if($request->file('file')){
                $redressementfinancier= (new importRF)->toArray($request->file('file')->store('temp'));
                    foreach($redressementfinancier["Redressement financier"] as $data)
                    {
                        $depense=$data[6];
                        if($depense==null){
                            $depense=0;
                        }

                        $budget= $data[3];
                        if($budget==null){
                            $budget=0.0;
                        }
                        RedressementFinancier::create([
                            'Employee' => $data[0],
                            'Action'=> $data[1],
                            'Situation_actuelle'=> $data[2],
                            'Budget'=> $budget,
                            'Unite'=> $data[4],
                            'Pourcentage_avancement'=> $data[5],
                            'Depense'=> $depense,
                            'Fin2022'=> $data[7],
                            'Juin2022'=> $data[8],
                            'Fin2023'=> $data[9],
                            'Resultat_Attendu'=> $data[10],
                        ]);
                    }

                    $redressementtechnique= (new importRT)->toArray($request->file('file')->store('temp'));
                    foreach($redressementtechnique["Redressement technique"] as $data)
                    {
                        $depense=$data[6];
                        if($depense==null){
                            $depense=0;
                        }

                        $budget= $data[3];
                        if($budget==null){
                            $budget=0.0;
                        }
                        RedressementTechnique::create([
                            'Employee' => $data[0],
                            'Action'=> $data[1],
                            'Situation_actuelle'=> $data[2],
                            'Budget'=> $budget,
                            'Unite'=> $data[4],
                            'Pourcentage_avancement'=> $data[5],
                            'Depense'=> $depense,
                            'Fin2022'=> $data[7],
                            'Juin2022'=> $data[8],
                            'Fin2023'=> $data[9],
                            'Resultat_Attendu'=> $data[10],
                        ]);
                    }

                    $projetBailleur= (new importPB)->toArray($request->file('file')->store('temp'));
                    foreach($projetBailleur["Projets Bailleurs"] as $data)
                    {
                        $depense=$data[6];
                        if($depense==null){
                            $depense=0;
                        }

                        $budget= $data[3];
                        if($budget==null){
                            $budget=0.0;
                        }
                        ProjetsBailleurs::create([
                            'Employee' => $data[0],
                            'Action'=> $data[1],
                            'Situation_actuelle'=> $data[2],
                            'Budget'=> $budget,
                            'Unite'=> $data[4],
                            'Pourcentage_avancement'=> $data[5],
                            'Depense'=> $depense,
                            'Fin2022'=> $data[7],
                            'Juin2022'=> $data[8],
                            'Fin2023'=> $data[9],
                            'Resultat_Attendu'=> $data[10],
                        ]);
                    }

                    $redressementcommercial= (new fileImport)->toArray($request->file('file')->store('temp'));
                    foreach($redressementcommercial["Redressement commercial"] as $data)
                    {
                        $depense=$data[6];
                        if($depense==null){
                            $depense=0;
                        }

                        $budget= $data[3];
                        if($budget==null){
                            $budget=0.0;
                        }
                        RedressementCommercial::create([
                            'Employee' => $data[0],
                            'Action'=> $data[1],
                            'Situation_actuelle'=> $data[2],
                            'Budget'=> $budget,
                            'Unite'=> $data[4],
                            'Pourcentage_avancement'=> $data[5],
                            'Depense'=> $depense,
                            'Fin2022'=> $data[7],
                            'Juin2022'=> $data[8],
                            'Fin2023'=> $data[9],
                            'Resultat_Attendu'=> $data[10],
                        ]);
                    }
                
            //dd($redressementfinancier);
            return View('statistiqueChoix');
        }else{
            return View('choixRole')->with('errors', 'Veuillez selectionner un fichier');
        }
    }
}
