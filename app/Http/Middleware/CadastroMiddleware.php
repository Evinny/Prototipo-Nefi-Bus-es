<?php

namespace App\Http\Middleware;

use Closure;
use App\Inscrito;
use App\Empresa;

class CadastroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        

        $tipo = $_POST['tipo'];

        switch($tipo){
            case 1:
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
            
                return $next($request);
                break;
            
            
            case 2:
                
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
                
                
        
                return $next($request);
                break;
            

            default:
                return response('opa guerreiro tem algo errado');



            }
        }
        
        
        
        
        
}
    
    

