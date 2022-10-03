<?php

namespace App\Http\Middleware;

use Closure;
use App\TempLog;


class EmpresalogMiddleware
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

        //simplesmente verifica se o usuario atual na (temp_log) está logado como uma empresa
        $autenticate = TempLog::all()->first()->toarray();

        if ($autenticate['ip'] == $ip){
            if($autenticate['auth_empresa'] == '1'){
                return $next($request);
            }
        }

        if ($autenticate['auth_adm'] == '0' and $autenticate['auth_inscrito'] == '0' and $autenticate['auth_empresa'] == '0'){
            return response('Voce não esta logado');
        }

        return response('Voce nao é uma empresa');
    }
    
}
