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
        
        //----------------------------------------------|
        //Seção de declaração
        $ip = $request->server->get('REMOTE_ADDR');
        
        $inputUser = $request['usuario'];
        $inputSenha = $request['senha'];
        

        $ti = TempLog::all()->first();
        $LogAdm = Adiministrador::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogEmpresa = Empresa::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        $LogInscrito = inscrito::where('usuario', '=', $inputUser )->where('senha', '=', $inputSenha )->get();
        //----------------------------------------------|



        //----------------------------------------------|
        //teste de contas duplicatas 
        if ($LogAdm == $LogAdm or $LogAdm == $LogInscrito or $LogInscrito == $LogEmpresa){
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
            return response('site.index');
        }





        return redirect('/login')->with('negado', 'negado');
    }
}
