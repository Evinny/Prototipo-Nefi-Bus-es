<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\TempLog;

class HomePageController extends Controller
{
    public function sessao(){
        $teste = TempLog::all()->toarray();
        
        
        if ($teste[0]['auth_adm'] == 1 or $teste[0]['auth_empresa'] == 1 or $teste[0]['auth_inscrito'] == 1){
            $state = 'Encerrar sessão';
        } 
        else{
            $state = 'Cadastrar-se';
        }

        return view('home_page')->with('state', $state);

    }
}