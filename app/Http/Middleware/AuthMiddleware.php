<?php

namespace App\Http\Middleware;
namespace App\TempLog;

use Closure;

class AuthMiddleware
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

        $autenticate = new TempLog;
        $autenticate = TempLog::all()->first()->toarray();

        if ($autenticate['ip'] == $UserToken);
            



            return $next($request);
        
        
        
        return $next($request);
    }
}
