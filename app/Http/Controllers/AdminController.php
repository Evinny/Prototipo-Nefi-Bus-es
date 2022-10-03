<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adiministrador;
use App\Empresa;
use App\Inscrito;
use App\Http\Middleware\LoginMiddleware;
use App\EmpresaConfirmada;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('AutorizarAdm');
    }
    
    
    public function log(request $request){ //manda as info para serem mostradas na view adm tools
        
        $data_emp = Empresa::where('id', '>', '0')->get()->toarray();           
        $data_ins = Inscrito::all();
        $data_emp_conf = EmpresaConfirmada::all();
        return view('adm_tools')->with(['data_emp' => $data_emp])->with(['data_ins' => $data_ins])->with(['data_emp_conf' => $data_emp_conf]);;
            



    }

    public function confirm_emp(){ //controller q faz a confirmação de uma empresa após o usuario a selecionar
        print_r($_POST);
        $teste = array($_POST);
        //print_r($teste);
        
        $confirm = new EmpresaConfirmada;
        
        $confirm->nome = $_POST['nome'];
        $confirm->tipo = $_POST['tipo'];
        $confirm->email = $_POST['email'];
        $confirm->cnpj = $_POST['cnpj'];
        $confirm->responsavel = $_POST['responsavel'];
        $confirm->estado = $_POST['estado'];
        $confirm->telefone = $_POST['telefone'];
        if (isset($_POST['usuario'])){
            $confirm->usuario = $_POST['usuario'];
        }
        if (isset($_POST['senha'])){
            $confirm->senha = $_POST['senha'];
        }
        
        $confirm->save();
        
        $remove = Empresa::where('id', '=', $_POST['id'])->delete();

        return redirect()->route('site.admi');
    }

   
}