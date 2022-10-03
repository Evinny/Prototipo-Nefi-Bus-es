<?php

namespace App\Http\Middleware;


use Closure;
use App\Adiministrador;
use App\Empresa;
use App\EmpresaConfirmada;
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
        

        
        

        //----------------------------------------------|
        //Seção de declaração
        $ip = $request->server->get('REMOTE_ADDR');
        
        $inputUser = $request['usuario'];
        $inputSenha = $request['senha'];
        

        $ti = TempLog::all()->first();
        $LogAdm = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogEmpresa = EmpresaConfirmada::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogInscrito = inscrito::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        //----------------------------------------------|
        //return response(print_r("$LogEmpresa-----------------------$LogInscrito"));


        //----------------------------------------------|
        //teste de contas duplicatas 
        
        

        if  (($LogAdm->isnotempty()) and ($LogInscrito->isnotempty()) or ($LogAdm->isnotempty()) and ($LogEmpresa->isnotempty()) or ($LogInscrito->isnotempty()) and ($LogEmpresa->isnotempty())){
            $resolve = TempLog::where('ip', '=', $ip);
            
            $resolve->update(['resolveUser' => $inputUser, 'resolveSenha' => $inputSenha]);
            
            
            return redirect()->route('login.resolve');
        }
        //----------------------------------------------|


        //----------------------------------------------|
        //teste de validação de usuario dentro da base de dados de adms
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
        //----------------------------------------------|
       
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

 //depois eu faço uns comentarios bonitos q nem esses sorry

        return redirect()->route('login');
    }
}
