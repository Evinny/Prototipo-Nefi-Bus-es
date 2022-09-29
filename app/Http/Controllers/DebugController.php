<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscrito;
use App\TempLog;

class DebugController extends Controller
{
    public function empTeste(){
        //random inscritos para empresas trabalharem
        $jobData = Inscrito::all()->toarray();
        $user = TempLog::all()->pluck('resolveUser')->toarray();
        $user = $user[0];
        

        return view('EmpresasJobs')->with('user',$user)->with('jobData',$jobData);
    }
}
