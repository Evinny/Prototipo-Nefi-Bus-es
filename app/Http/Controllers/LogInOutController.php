<?php

namespace App\Http\Controllers;

use App\TempLog;

use Illuminate\Http\Request;

class LogInOutController extends Controller
{
    public function in(){


    }

    public function out(){

        $updt = TempLog::all()->first();
        $updt->auth_adm = 0;
        $updt->auth_inscrito = 0;
        $updt->auth_empresa = 0;
        $updt->save();
        return redirect()->route('site.index');
        

    }


}
