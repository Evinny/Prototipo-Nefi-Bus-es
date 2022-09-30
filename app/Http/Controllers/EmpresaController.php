<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscrito;
use App\TempLog;

class EmpresaController extends Controller
{
    public function __construct(){
        $this->middleware('AutorizarEmp');
    }
    
    public function tools(){
        //random inscritos para empresas trabalharem
    $jobData = Inscrito::all()->toarray();
    $user = TempLog::all()->pluck('resolveUser')->toarray();
    $user = $user[0];
    

    return view('EmpresasJobs')->with('user',$user)->with('jobData',$jobData);
    }
}
