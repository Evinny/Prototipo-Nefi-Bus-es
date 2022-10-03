<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function route(){ //so pra isso mesmo
        return view('RegisterForm');
    }
}
