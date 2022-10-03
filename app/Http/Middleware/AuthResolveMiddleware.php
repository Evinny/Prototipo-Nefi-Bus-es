<?php

namespace App\Http\Middleware;

use Closure;
use App\Adiministrador;
use App\Empresa;
use App\EmpresaConfirmada;
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

        
        
        
        
        print_r($request['account_type']);
        $temp = $_POST['account_type'];
        
        switch ($temp){
            case 1:
                $LogInscrito = inscrito::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
                
                if ($LogInscrito->IsNotEmpty()){
        
                    //se o usuario e senha forem legitimos, atualiza a database templog que o usuario é um adm
                    $del = TempLog::all()->first()->delete();
                    $aut = new TempLog;
                    $aut->auth_inscrito = true;
                    $aut->auth_empresa = false;
                    $aut->auth_adm = false;
                    $aut->ip = $ip;
                    $aut->resolveUser = $inputUser;
                    $aut->save();
                    return redirect()->route('site.index');
                }
            case 2:
                $LogEmpresa = EmpresaConfirmada::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
                
                if ($LogEmpresa->IsNotEmpty()){
        
                    //se o usuario e senha forem legitimos, atualiza a database templog que o usuario é um adm
                    $del = TempLog::all()->first()->delete();
                    $aut = new TempLog;
                    $aut->auth_inscrito = false;
                    $aut->auth_empresa = true;
                    $aut->auth_adm = false;
                    $aut->ip = $ip;
                    $aut->resolveUser = $inputUser;
                    $aut->save();
                    return redirect()->route('site.index');
                }
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
                    $aut->resolveUser = $inputUser;
                    $aut->save();
                    return redirect()->route('site.index');
                }
        
        return response('deu certoetojejgoaj');
        }
    }
}