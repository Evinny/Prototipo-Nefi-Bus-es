<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;


class InscritoController extends Controller
{
    public function __construct(){//ainda tenho planos para esse controlador
        $this->middleware('EmpInsConfirm');
    

    }



}
