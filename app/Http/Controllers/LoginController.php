<?php

namespace App\Http\Controllers;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoriqueRole;
use App\Models\direction;

class LoginController extends Controller
{
    public function returnView(){
        return view('welcome');
    }

    public function logUser(Request $request){
        $login= $request->input('login');
        $password= $request->input('password');

        if(Adldap::auth()->attempt($login,$password,$bindAsUser=true)){
            $result=Adldap::search()->findBy('samaccountname',$login);
            $role=null;
            $data=[];
            $historique= HistoriqueRole::all();
            $direction= direction::all();
            $data['historique']=$historique;
            session()->put('name',$result['name'][0]);
            session()->put('mail',$result['mail'][0]);
            session()->put('role',$role);
            $data['role']=$role;
            $data['direction']=$direction;
            
            return View('choixRole',compact('data'));
        }
        else{
            return View('welcome')->with('Error','Une des informations communiqué est invalide');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return View('Welcome');
    }
}
