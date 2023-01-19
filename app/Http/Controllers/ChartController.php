<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\RedressementFinancier;
use App\Models\RedressementTechnique;
use App\Models\RedressementCommercial;
use App\Models\ProjetsBailleurs;
use App\Models\HistoriqueRole;

class ChartController extends Controller
{
    
    public function detailler(String $action){
        $sheet=session()->get('sheet');
        $data=[];
        $tab=[];
        if($sheet=='RedressementFinancier'){
            $data=RedressementFinancier::where('action',$action)->get()->toArray();
            $tab=RedressementFinancier::select(DB::raw("depense"))->where('action',$action)->get()->toArray();
            $label=RedressementFinancier::select(DB::raw("MONTHNAME(created_at) as month"))->where('action',$action)->get()->toArray();
            //dd($data);
        }elseif($sheet=='RedressementTechnique'){
            $data=RedressementTechnique::where('action',$action)->get()->toArray();
            $tab=RedressementTechnique::select(DB::raw("depense"))->where('action',$action)->get()->toArray();
            $label=RedressementTechnique::select(DB::raw("MONTHNAME(created_at) as month"))->where('action',$action)->get()->toArray();
        }elseif($sheet=='RedressementCommercial'){
            $data=RedressementCommercial::where('action',$action)->get()->toArray();
            $tab=RedressementCommercial::select(DB::raw("depense"))->where('action',$action)->get()->toArray();
            $label=RedressementCommercial::select(DB::raw("MONTHNAME(created_at) as month"))->where('action',$action)->get()->toArray();
        }elseif($sheet=='ProjetsBailleurs'){
            $data=ProjetsBailleurs::where('action',$action)->get()->toArray();
            $tab=ProjetsBailleurs::select(DB::raw("depense"))->where('action',$action)->get()->toArray();
            $label=ProjetsBailleurs::select(DB::raw("MONTHNAME(created_at) as month"))->where('action',$action)->get()->toArray();
        }


        //dd($label);
        return View('chart',compact('data','tab','label'));
    }

}

?>
