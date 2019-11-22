<?php

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
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');


Route::get('/inicio', 'LoginController@inicio')->name('inicio');

Route::get('/', 'LoginController@login')->name('login');

    
Route::group(['prefix' => 'professors'], function () {
    Route::get('/cadastrar','ProfessoresController@cadastrar')->name('professors.cadastrar');
    Route::get('/listar','ProfessoresController@listar')->name('professors.listar');
    Route::get('/editar/{id}','ProfessoresController@editar')->name('professors.editar');
    Route::post('/alterar/{id}', 'ProfessoresController@alterar')->name('professors.alterar');
    Route::get('/visualizar/{id}', 'ProfessoresController@visualizar')->name('professors.visualizar');
    Route::get('/excluir/{id}','ProfessoresController@excluir')->name('professors.excluir');
});

Route::group(['prefix' => 'alunos'], function () {
    Route::get('/cadastrar','AlunosController@cadastrar')->name('alunos.cadastrar');
    Route::get('/listar','AlunosController@listar')->name('alunos.listar');
    Route::get('/editar/{id}','AlunosController@editar')->name('alunos.editar');
    Route::post('/alterar/{id}', 'AlunosController@alterar')->name('alunos.alterar');
    Route::get('/visualizar/{id}', 'AlunosController@visualizar')->name('alunos.visualizar');
    Route::get('/excluir/{id}','AlunosController@excluir')->name('alunos.excluir');
});

Route::group(['prefix' => 'curso'], function(){
    Route::get('/cadastrar', 'CursosController@redirecionarTelaCadastro')->name('cursos.cadastrar');
    Route::get('/listar', 'CursosController@listarCursos')->name('cursos.listar');
    Route::get('/editar/{id}', 'CursosController@editarCurso')->name('cursos.editar');
    Route::post('/alterar/{id}', 'CursosController@alterarCurso')->name('cursos.alterar');
    Route::get('/vizualizar/{id}', 'CursosController@visualizarCurso')->name('cursos.visualizar');
    Route::get('/excluir/{id}','CursosController@excluirCurso')->name('cursos.excluir');
    Route::post('/cadastrarCurso','CursosController@cadastrarCurso')->name('cursos.executarCadastro');
});

Route::post('/dadosAluno','AlunosController@dadosAluno')->name('dadosAluno');
Route::post('/dados','ProfessoresController@dados')->name('dados');
Route::post('logon', 'LoginController@logon')->name('logon');

Route::get('cadastros','LoginController@cadastros')->name('cadastros');
Route::get('listagem','LoginController@listagem')->name('listagem');
Route::get('venda','LoginController@venda')->name('venda');
Route::post('/inicio1', 'LoginController@inicio')->name('inicio1');