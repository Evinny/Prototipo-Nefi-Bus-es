<?php

namespace App\Http\Middleware;

use Closure;
use App\Adiministrador;
use App\Empresa;
use App\Inscrito;
use App\TempLog;

class AuthResolveMiddleware
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

        $userSenha = TempLog::all()->first()->toarray();
        $inputUser = $userSenha['resolveUser'];
        $inputSenha = $userSenha['resolveSenha'];

        $LogEmpresa = Empresa::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogInscrito = inscrito::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        
        
        print_r($request['account_type']);
        $temp = $_POST['account_type'];
        
        switch ($temp){
            case 1:
                print_r('qual foi ');
            case 2:
                print_r('deu certo');
            case 3:
                $LogAdm = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
                
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
        
        return response('deu certoetojejgoaj');
        }
    }
}