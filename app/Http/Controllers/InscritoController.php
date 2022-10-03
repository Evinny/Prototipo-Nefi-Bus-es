<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;


class InscritoController extends Controller
{
    public function __construct(){
        $this->middleware('EmpInsConfirm');
    }


    public function tools(){
        return response('oiiiiiiiiiiiii');
        $dataEmp = Empresa::all()->toarray();

        return view('inscrito_tools')->with('dataEmp', $dataEmp);


    }



}
