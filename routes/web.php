<?php

use Illuminate\Support\Facades\Route;













//DEBUG -------|
Route::get('/debug', 'DebugController@Teste')->name('debug');



//-----------ROTAS DIRETAS------------//

    Route::get('/', 'HomePageController@sessao')->name('site.index');
    route::get('/Cadastro', 'CadastroController@route')->name('register');
    route::middleware('Cadastro')->post('/Cadastro', function(){
        return view('redirect');
    })->name('cadastrar');
    
    
    
//---------------------------------------//

// fazer a tela depois do login dos inscritos e das empresas, fazer os administradores aceitarem apenas
// empresas q eles aceitarem na sua aba de ferramentas, fazer o login de todos


//-----------ROTAS INDIRETAS------------//




    //-----------INSCRITOS------------//
    //faz a inscrição de inscritos no sistema 
    route::get('/dados', 'InscriçãoController@route')->name('site.dados');
    route::post('/Inscrição', 'InscriçãoController@form')->name('site.inscrito');



    //-----------EMPRESAS------------//
    //faz a inscrição de empresas no sistema
    route::get('/dados/empresa', function(){
        return view('reg_form_empresa');
    })->name('site.EmpresaForm');//Acessa o formulario
        route::post('/Inscrição/empresa', 'InscriçãoController@emp_form')->name('site.EmpresaLog');//faz a inserção no banco

    //acessa o menu tools das empresas
    route::get('/Empresa/tools', 'EmpresaController@tools')->name('empresa.tools');

        

    //-----------ADIMINISTRAÇÃO------------//
        
    route::get('/admin/tools', 'AdminController@log')->name('site.admi'); //-> acessa diretamente as ferramentas do menu tools
    route::post('/admin/tools', 'AdminController@confirm_emp')->name('site.adm');
        
    //---------------------------------------//
        
//-----------LOGIN------------//
        
        
    Route::get('/login', function(){ 
        return view('Login_form'); 
    })->name('login'); //acessa o formulario de login diretamente

    route::middleware('login')->post('/login', function(){})->name('site.login'); //faz o login de uma conta atravez do middleware "login"
    //e loga a conta no banco, ou inicia o resolve caso tenha contas repetidas em outros bancos
    
    route::get('/unlog', 'LogInOutController@out')->name('unlog'); //remove da base de dados temporaria
    //todos os dados de login (0 -> 1)
        
    //-----------CONTAS REPETIDAS------------//
        route::get('/login/resolve', 'InscriçãoController@resolve')->name('login.resolve');//
        route::post('/login/resolve', 'InscriçãoController@resolve')->name('login.resolve');
        route::middleware('resolve')->post('/login/resolved', 'InscriçãoController@resolved')
        ->name('login.resolved');
        
        
//---------------------------------------//

//-----------FALLBACK------------//
Route::fallback(function() {
    return view('wip');
});

