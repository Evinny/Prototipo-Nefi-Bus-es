<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\TempLog;

class HomePageController extends Controller
{
    public function sessao(request $request){//checa para ver se existe um usuario ja logado ou nao para assim mostrar a mensagem 
        //encerrar sessão, e cadastrar-se respectivamente
        //alem de fazer o cadastro do membro local, evitando erros por nao existir a base de dados Temp_Logs
        
        $ip = $request->server->get('REMOTE_ADDR');
        
        TempLog::create(['auth_inscrito'=> false, 'auth_empresa'=> false, 'auth_adm'=> false, 'ip'=> $ip]);
        
        $teste = TempLog::all();
       
        
        if (($teste->count()) > 1){
            $delete = TempLog::all()->last()->delete();
        }
        
        



        if (empty($teste)){
            return view('home_page')->with('state', 'Cadastrar-se');
        }


        if (($teste[0]['auth_adm'] == 1 or $teste[0]['auth_empresa'] == 1 or $teste[0]['auth_inscrito'] == 1) ){
            $state = 'Encerrar sessão';
        } 
        else{
            $state = 'Cadastrar-se';
        }

        return view('home_page')->with('state', $state);

    }
}