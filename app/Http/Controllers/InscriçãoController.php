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

    public function resolve(request $request){

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

    public function resolved(request $request){
        
        print_r($request['account_type']);
        $temp = $_POST['account_type'];
        
        
        
        return redirect()->route('site.index');
    }



}
