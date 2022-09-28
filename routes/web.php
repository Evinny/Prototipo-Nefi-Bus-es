<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//ROTAS DIRETAS -------|

Route::get('/', function () { 
    return view('home_page');
})->name('site.index');

Route::get('/login', function(){ //login no middleware LoginMiddleware passando pela view login e
    return view('Login_form'); //so depois de passar pelo form, manda por post pra rota post do adm
})->name('login');              // e é interceptado pelo middle




//-----------------------|

//-----------------------|

//ROTAS INDIRETAS -------|


route::get('/unlog', 'LogInOutController@out')->name('unlog'); //remove da base de dados temporaria
//todos os dados de login (0 -> 1)

// fazer a tela depois do login dos inscritos e das empresas, fazer os administradores aceitarem apenas
// empresas q eles aceitarem na sua aba de ferramentas, fazer o login de todos, achar uma forma de criar
//apenas 1 middleware para fazer a autorização dos 3 caba idenpendente se for adm inscrito ou empresa

//faz a inscrição de inscritos no sistema 
route::get('/dados', 'InscriçãoController@route')->name('site.dados');
route::post('/Inscrição', 'InscriçãoController@form')->name('site.inscrito');

//faz a inscrição de empresas no sistema
route::get('/dados/empresa', 'InscriçãoController@emp_route')->name('site.Empresadados');
route::post('/Inscrição/empresa', 'InscriçãoController@emp_form')->name('site.Empresainscrito');


//autoriza e loga as seçoes adiministradoras
route::get('/admin/login', 'AdminController@log')->name('site.adm'); //-> acessa diretamente as ferramentas
route::middleware('login')->post('/login', function(){})->name('site.adm'); //-> serve apenas para um form dar um redirect
//para salvar as informaçoes de login atravez do middleware login


route::get('/login/resolve', 'InscriçãoController@resolve')->name('login.resolve');
route::post('/login/resolve', 'InscriçãoController@resolve')->name('login.resolve');


//-----------------------|


