<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresaConfirmada;
use App\TempLog;

class RoutesController extends Controller
{
    public function instools(){ //da a inscritos tools as informaçoes necessarias, 
        $dataEmp = EmpresaConfirmada::all()->toarray();
        
        return view('inscrito_tools')->with('dataEmp', $dataEmp);

    }

    public function ins_parameters(){
        
        $EmpData = $_POST;
        print_r($_POST);
        
        $usuario = TempLog::all()->first()->pluck('resolveUser')->toarray();
        print_r($usuario[0]);

        return view('Senha_to_contratar')->with('usuario', $usuario)->with('EmpData', $EmpData);



    }
}
