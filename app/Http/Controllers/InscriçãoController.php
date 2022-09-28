<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adiministrador;
use App\Empresa;
use App\Inscrito;
use App\TempLog;

class InscriçãoController extends Controller
{
    public function form(request $request){
      
        $request->validate([
            'nome'=>'required', 'sobrenome'=>'required',
            'idade'=>'required', 'telefone'=>'required',
            'rg'=>'required', 'cpf'=>'required', 'email'=>'required','usuario'=>'required', 
            'senha'=>'required'
        ]);

        $insert = new Inscrito;
        $insert->nome = $_POST['nome'];
        $insert->sobrenome = $_POST['sobrenome'];
        $insert->cpf = $_POST['cpf'];
        $insert->rg =  $_POST['rg'];
        $insert->idade =  $_POST['idade'];
        $insert->telefone = $_POST['telefone'];
        $insert->email = $_POST['email'];
        $insert->usuario = $_POST['usuario'];
        $insert->senha = $_POST['senha'];
        

        $insert->save();     
        
        

        return view('redirect');
    }

    public function route(){
        echo('Inscrição');
        echo(' ');
        return view('reg_form');
    }
    
    
    
    
    
    public function emp_route(){
        echo('registre sua empresa');
        return view('reg_form_empresa');

    }
    public function emp_form(request $request){
        
        $request->validate([
            'nome'=>'required', 'responsavel'=>'required',
            'tipo'=>'required', 'telefone'=>'required',
            'estado'=>'required', 'cnpj'=>'required', 'email'=>'required','usuario'=>'required', 
            'senha'=>'required',
        ]);
        
        $insert = new Empresa;
        $insert->nome = $_POST['nome'];
        $insert->responsavel = $_POST['responsavel'];
        $insert->cnpj = $_POST['cnpj'];
        $insert->email =  $_POST['email'];
        $insert->estado =  $_POST['estado'];
        $insert->telefone = $_POST['telefone'];
        $insert->tipo = $_POST['tipo'];
        $insert->usuario = $_POST['usuario'];
        $insert->senha = $_POST['senha'];

        $insert->save();     
        
        

        return view('redirect');
    }

    public function resolve(){



        //a variavel $inputuser so existe no middleware
        $LogAdm = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogEmpresa = Empresa::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogInscrito = inscrito::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();

        if ($LogAdm->isEmpty())
            $ExistsAdm = 1;
        if ($LogEmpresa->isEmpty())
            $ExistsEmpresa = 1;
        if ($LogInscrito->isEmpty())
            $ExistsInscrito = 1;

            return view('account_resolve_select')->with($ExistsAdm)->with($ExistsEmpresa)
            ->with($ExistsInscrito);

    }



}
