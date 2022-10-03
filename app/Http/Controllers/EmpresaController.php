<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscrito;
use App\TempLog;
use App\EmpresaConfirmada;

class EmpresaController extends Controller
{
    public function __construct(){
        $this->middleware('AutorizarEmp');
    }
    
    public function tools(){ //da as variaveis para serem mostradas na view de tools de empresas (emptools eu acho)
        //random inscritos para empresas trabalharem
        $user = TempLog::all()->pluck('resolveUser')->toarray();
        $user = $user[0];
        $jobLog = EmpresaConfirmada::where('usuario', '=', $user)->get();
        if ($jobLog->isempty())
            return response('sua empresa nao esta logada');
        $jobLog->toarray();
        
        $idLog = $jobLog[0]['id'];
        
        $InscritosCadastrados = Inscrito::where('empresa_confirm_id', '=', $idLog)->get();
        if ($InscritosCadastrados->isempty())
            $jobData = 'Você não possui nenhum cliente';
        else{
            $jobData = $InscritosCadastrados->toarray();
            
        }
        

        
        
    

    return view('EmpresasJobs')->with('user',$user)->with('jobData',$jobData);
    }
}
