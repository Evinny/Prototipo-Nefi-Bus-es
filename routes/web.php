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

Route::get('/', function () {
    return view('home_page');
})->name('site.index');

Route::get('/login', function(){
    return view('Login_form');
})->name('login');

route::get('/unlog', 'LogInOutController@out')->name('unlog');

// fazer a tela depois do login dos inscritos e das empresas, fazer os administradores aceitarem apenas
// empresas q eles aceitarem na sua aba de ferramentas, fazer o login de todos, achar uma forma de criar
//apenas 1 middleware para fazer a autorização dos 3 caba idenpendente se for adm inscrito ou empresa
route::get('/dados', 'InscriçãoController@route')->name('site.dados');
route::post('/Inscrição', 'InscriçãoController@form')->name('site.inscrito');

route::get('/dados/empresa', 'InscriçãoController@emp_route')->name('site.Empresadados');
route::post('/Inscrição/empresa', 'InscriçãoController@emp_form')->name('site.Empresainscrito');

route::/*middleware('autorizar')->*/get('/admin/login', 'AdminController@log')->name('site.adm');
route::middleware('login')->post('/admin/login', 'AdminController@log')->name('site.adm');




