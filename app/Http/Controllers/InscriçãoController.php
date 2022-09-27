<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscrito;
use App\Empresa;

class InscriçãoController extends Controller
{
    public function form(request $request){
      
        $request->validate([
            'nome'=>'required', 'sobrenome'=>'required',
            'idade'=>'required', 'telefone'=>'required',
            'rg'=>'required', 'cpf'=>'required', 'email'=>'required',
        ]);

        $insert = new Inscrito;
        $insert->nome = $_POST['nome'];
        $insert->sobrenome = $_POST['sobrenome'];
        $insert->cpf = $_POST['cpf'];
        $insert->rg =  $_POST['rg'];
        $insert->idade =  $_POST['idade'];
        $insert->telefone = $_POST['telefone'];
        $insert->email = $_POST['email'];
        
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
    public function emp_form(){
        $insert = new Empresa;
        $insert->nome = $_POST['nome'];
        $insert->responsavel = $_POST['responsavel'];
        $insert->cnpj = $_POST['cnpj'];
        $insert->email =  $_POST['email'];
        $insert->estado =  $_POST['estado'];
        $insert->telefone = $_POST['telefone'];
        $insert->tipo = $_POST['tipo'];
        
        $insert->save();     
        
        

        return view('redirect');
    }





}
