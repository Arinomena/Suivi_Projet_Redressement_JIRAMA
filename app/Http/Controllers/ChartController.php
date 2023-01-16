<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if($sheet=='RedressementFinancier'){
            $data=RedressementFinancier::where('action',$action)->get()->toArray();
            //dd($data);
        }elseif($sheet=='RedressementTechnique'){
            $data=RedressementTechnique::where('action',$action)->get()->toArray();
        }elseif($sheet=='RedressementCommercial'){
            $data=RedressementCommercial::where('action',$action)->get()->toArray();
        }elseif($sheet=='ProjetsBailleurs'){
            $data=ProjetsBailleurs::where('action',$action)->get()->toArray();
        }

        //dd($data);
        return View('chart',compact('data'));
    }

}

?>
