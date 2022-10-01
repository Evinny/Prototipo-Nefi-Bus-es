<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscrito;
use App\TempLog;

class DebugController extends Controller
{
    public function Teste(){
        print_r('chegamos no debug');
    }
}
