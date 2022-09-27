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
        
        $inputUser = $request['usuario'];
        $inputSenha = $request['senha'];
        
        $temp = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        
        
        if ($temp->IsNotEmpty()){
        
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
