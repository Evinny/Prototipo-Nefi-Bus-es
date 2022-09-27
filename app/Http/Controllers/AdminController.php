<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adiministrador;
use App\Empresa;
use App\Inscrito;
use App\Http\Middleware\LoginMiddleware;


class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('autorizar');
    }
    
    
    public function log(request $request){
        
       /* $request->validate([
            'usuario' => 'required', 'senha' => 'required'
        ]);
        */
        /*$inputUser = $request['usuario'];
        $inputSenha = $request['senha'];
        
        $temp = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        
        
        if ($temp->isNotEmpty()){
        
        $data_emp = Empresa::where('id', '>', '0')->get()->toarray();           
        $data_ins = Inscrito::all();
        return view('adm_tools')->with(['data_emp' => $data_emp])->with(['inscritos' => $data_ins]);
        }
        */
        
        $data_emp = Empresa::where('id', '>', '0')->get()->toarray();           
        $data_ins = Inscrito::all();
        return view('adm_tools')->with(['data_emp' => $data_emp])->with(['inscritos' => $data_ins]);
            



    }

    

    public function form(){
        echo('entre na sua conta');
        return view('adm_login');
    }
}
