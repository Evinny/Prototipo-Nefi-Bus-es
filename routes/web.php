<?php

use Illuminate\Support\Facades\Route;





/*=========================================================================================//

NOTAS: A UNICA COISA QUE FALTA, É IR NO BANCO E CRIAR UMA CONTA NA TABELA 'ADIMINISTRADORES'
PARA SE INSCREVER COMO ADM E ACESSAR A PARTE DE ADM DO SITE

TEM MUITAS PARTES DE DEBUG, ENTAO TENTA IGNORAR, COMO VOCE DISSE, NAO SOU FRONT-END

APENAS O QUE APARECE IMEDIATAMENTE AO ABRIR O SITE QUE É FUNCIONAL, O RESTO É WIP

MUITOS ARQUIVOS DESNECESSARIOS, MAS N ATRAPALHAM, E TA TARDE VOU DORMIR

NOTA IMPORTANTE: FIZ O SITE INTEIRO SEM AJUDA DO CURSO DA UDEMY, APENAS COM O CONHECIMENTO DE MIDDLEWARES
E MUITA PESQUISA NO GOOGLE, OU SEJA, AS MINHAS PRATICAS DEVEM SER AS PIORES, MAS ME DA UMA COLHERZINHA DE 
CHA, ;-;

/*=========================================================================================*/











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
    route::middleware('AutorizarIns')->get('/inscritos/tools', 'RoutesController@instools')->name('inscritoTools'); //acessa as tools dos inscritos
    route::post('/inscritos/getty', 'RoutesController@ins_parameters')->name('ins_parameters'); //prepara para q o inscrito contrate uma empresa

    route::middleware('EmpInsConfirm')->post('/inscritos/Contratação', function(){return response('oi');})->name('contratar'); //afirma a empresa contratada num sistema de 1 para muitos (botei o limite de 40)





    //-----------EMPRESAS------------//
    //faz a inscrição de empresas no sistema
    
        route::post('/Inscrição/empresa', 'InscriçãoController@emp_form')->name('site.EmpresaLog');//realiza o cadastro de uma empresa no banco

    //acessa o menu tools das empresas
        route::get('/Empresa/tools', 'EmpresaController@tools')->name('empresa.tools'); //acessa o menu de tools das empresas

        

    //-----------ADIMINISTRAÇÃO------------//
        
    route::get('/admin/tools', 'AdminController@log')->name('site.admi'); //-> acessa diretamente as ferramentas do menu tools
    route::post('/admin/tools', 'AdminController@confirm_emp')->name('site.adm'); //declara que a empresa selecionada deve ser confirmada
        
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
        route::get('/login/resolve', 'InscriçãoController@resolve')->name('login.resolve');//acessa a parte de resolução do problema de varias contas
        
        route::middleware('resolve')->post('/login/resolved', 'InscriçãoController@resolved')
        ->name('login.resolved'); //conclui o problema e loga o usuario escolhido
        
        
//---------------------------------------//

//-----------FALLBACK------------//
Route::fallback(function() {
    return view('wip');
});

