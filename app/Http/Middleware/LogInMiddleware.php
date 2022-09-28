<?php

namespace App\Http\Middleware;


use Closure;
use App\Adiministrador;
use App\Empresa;
use App\Inscrito;
use App\TempLog;

class LogInMiddleware
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

        $ip = $request->server->get('REMOTE_ADDR');
        
        $inputUser = $_POST['usuario'];
        $inputSenha = $_POST['senha'];
        
        $LogAdm = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogEmpresa = Empresa::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogInscrito = inscrito::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        
        if ($LogAdm == $LogAdm or $LogAdm == $LogInscrito or $LogInscrito == $LogEmpresa ){
            return redirect()->route('login.resolve');
        }

        if ($LogAdm->IsNotEmpty()){
        
            //se o usuario e senha forem legitimos, atualiza a database templog que o usuario é um adm
            $del = TempLog::all()->first()->delete();
            $aut = new TempLog;
            $aut->auth_inscrito = false;
            $aut->auth_empresa = false;
            $aut->auth_adm = true;
            $aut->ip = $ip;
            $aut->save();
            return redirect()->route('site.index');
        }

       
        
       
        return redirect('/login')->with('negado', 'negado');
    }
}
