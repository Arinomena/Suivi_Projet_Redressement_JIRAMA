<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Datas;
use App\Imports\fileImport;
use App\Imports\importRF;
use App\Imports\importRT;
use App\Imports\importPB;

use Illuminate\Http\Request;

class ImportSheet extends Controller
{
    public function index(){
        return View('welcome');
    }

    public function import(Request $request){
        if($request->file('file')){
                $redressementfinancier= (new importRF)->toArray($request->file('file')->store('temp'));
                $redressementtechnique= (new fileImport)->toArray($request->file('file')->store('temp'));
                $redressementcommercial= (new importRT)->toArray($request->file('file')->store('temp'));
                $ProjetBailleur= (new importPB)->toArray($request->file('file')->store('temp'));
            $datas=array();
            $datas['redressementfinancier']=$redressementfinancier;
            $datas['redressementtechnique']=$redressementtechnique;
            $datas['redressementcommercial']=$redressementcommercial;
            $datas['ProjetBailleurs']=$ProjetBailleur;

            session()->push('data',$datas);
            dd($datas);
            //return View('statistique', compact('datas','datas'));
        }else{
            return View('choixRole')->with('errors', 'Veuillez selectionner un fichier');
        }
    }
}
