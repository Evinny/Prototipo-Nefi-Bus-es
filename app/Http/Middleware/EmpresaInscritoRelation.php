<?php

namespace App\Http\Middleware;

use Closure;
use App\EmpresaConfirmada;
use App\TempLog;
use App\Inscrito;
use App\Empresa;


class EmpresaInscritoRelation
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
        //estabelece a relação entre varios inscritos para uma só empresa
        $log = TempLog::all()->first()->toarray();
        $EmpresaConf = EmpresaConfirmada::all();
        $Inscrito = Inscrito::all();
        $senha = $_POST['senha'];
        
        $usuario = $log['resolveUser'];
        
        $detect = Inscrito::where('empresa_confirm_id', '=', $_POST['id'])->get();
        
        print_r($senha);
        print_r($usuario);
        
        if($detect->count() > 20) //limite de 20 inscritos por empresa
            return response('empresa lotada');

        $auth = Inscrito::where('usuario', '=', $usuario )->where( 'senha', '=', $senha)->get();
        
        if ($auth->isnotempty())
            $insertCadastro = Inscrito::where('usuario', '=', $usuario )->where( 'senha', '=', $senha)
                ->update(['empresa_confirm_id' => $_POST['id']]);
            return redirect()->route('site.index'); 

        






        return response($_POST['id']);
    }
}/*@foreach ($dataEmp as $k => $i)
<input type='hidden' value={{$i['nome']}}>
    {{$loop->iteration}} // {{ $i['nome'] }} // {{$i['tipo']}} // {{ $i['email'] }} // {{ $i['cnpj'] }} // {{ $i['responsavel'] }} // 
    {{ $i['estado'] }} // {{ $i['telefone'] }} // {{$i['usuario']}} || 
    <button type="submit" >Contratar</button><hr>
@endforeach
