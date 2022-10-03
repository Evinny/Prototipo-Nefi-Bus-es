<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adiministrador;
use App\Empresa;
use App\EmpresaConfirmada;
use App\Inscrito;
use App\TempLog;

class InscriçãoController extends Controller
{
    

    public function route(){ //n sei se ta sendo usado
        echo('Inscrição');
        echo(' ');
        return view('reg_form');
    }
    
    

    public function resolve(request $request){ //prepara tudo para que o usuario escolha qual das contas quer logar-se (adm emp ou inscrito)
        //assim resolvendo o problema de contas repetidas

        $temp = TempLog::all()->first()->toarray();
        
        $inputUser = $temp['resolveUser'];
        $inputSenha = $temp['resolveSenha'];
        //a variavel $inputuser so existe no middleware
        $LogAdm = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogEmpresa = EmpresaConfirmada::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogInscrito = inscrito::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();

        $Existsa = '';
        $Existse = '';
        $Existsi = '';

        if ($LogAdm->isnotEmpty())
            $Existsa = 1;
        if ($LogEmpresa->isnotEmpty())
            $Existse = 1;
        if ($LogInscrito->isnotEmpty())
            $Existsi = 1;
        
        
            return view('account_resolve_select')->with('Existsa', $Existsa)->with('Existse', $Existse)->with('Existsi',$Existsi);

    }

    public function resolved(request $request){ //redirect do middleware login, so pq eu quis msm
        
        print_r($request['account_type']);
        $temp = $_POST['account_type'];
        
        
        
        return redirect()->route('site.index');
    }



}
