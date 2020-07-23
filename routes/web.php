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

Route::get('/criandochatbot', 'LoginController@criandochatbot')->name('criandoChatBot');

    
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

Route::group(['prefix' => 'materia'], function(){
    Route::get('/cadastrar', 'MateriaController@redirecionarTelaCadastro')->name('materia.cadastrar');
    Route::get('/listar', 'MateriaController@listarMaterias')->name('materia.listar');
    Route::get('/editar/{id}', 'MateriaController@editarMateria')->name('materia.editar');
    Route::post('/alterar/{id}', 'MateriaController@alterarMateria')->name('materia.alterar');
    Route::get('/vizualizar/{id}', 'MateriaController@visualizarMateria')->name('materia.visualizar');
    Route::get('/excluir/{id}','MateriaController@excluirMateria')->name('materia.excluir');
    Route::post('/cadastrarMateria','MateriaController@cadastrarMateria')->name('materia.executarCadastro');
});

Route::group(['prefix' => 'pergunta'], function(){
    Route::get('/cadastrar', 'PerguntaController@redirecionarTelaCadastro')->name('pergunta.cadastrar');
    Route::get('/listar', 'PerguntaController@listarPergunta')->name('pergunta.listar');
    Route::get('/editar/{id}', 'PerguntaController@editarPergunta')->name('pergunta.editar');
    Route::post('/alterar/{id}', 'PerguntaController@alterarPergunta')->name('pergunta.alterar');
    Route::get('/vizualizar/{id}', 'PerguntaController@visualizarPergunta')->name('pergunta.visualizar');
    Route::get('/excluir/{id}','PerguntaController@excluirPergunta')->name('pergunta.excluir');
    Route::post('/cadastrarPergunta','PerguntaController@cadastrarPergunta')->name('pergunta.executarCadastro');
});

Route::post('/dadosAluno','AlunosController@dadosAluno')->name('dadosAluno');
Route::post('/dados','ProfessoresController@dados')->name('dados');
Route::post('logon', 'LoginController@logon')->name('logon');

Route::get('cadastros','LoginController@cadastros')->name('cadastros');
Route::get('listagem','LoginController@listagem')->name('listagem');
Route::get('venda','LoginController@venda')->name('venda');
Route::post('/inicio1', 'LoginController@inicio')->name('inicio1');