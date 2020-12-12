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
    return view('home')->name('home');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

/*
Route::get('/welcome', 'LoginController@welcome')->name('home');*/

/*Route::get('/', 'LoginController@login')->name('login');*/

Route::get('/criandochatbot', 'LoginController@criandochatbot')->name('criandoChatBot');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'mensagem'], function () {
        Route::get('/gerenciarFluxo/{id}', 'MensagemController@redirecionarParaTelaDeFluxo')->name('mensagem.cadastrar');
        Route::post('/', 'MensagemController@cadastrarMensagem')->name('mensagem.cadastrarMensagem');
        Route::delete('/delete', 'MensagemController@deletarOpcao')->name('mensagem.deletarOpcao');
        Route::post('/opcao', 'MensagemController@listarOpcoesParaNovaPergunta')->name('mensagem.listarOpcoes');
        Route::post('/opcaoMensagem', 'MensagemController@listarOpcoesMensagem')->name('mensagem.listarOpcoesMensagem');
        Route::put('/update', 'MensagemController@atualizarMensagem')->name('mensagem.atualizarMensagem');
    });


    Route::group(['prefix' => 'chatbot'], function () {
        Route::get('/cadastrar', 'ChatbotController@redirecionarParaTelaDeCadastro')->name('chatbot.cadastrar');
        Route::get('/listar', 'ChatbotController@listarChatbotsProfessor')->name('chatbot.listar');
        Route::get('/listarChatbotCurso', 'ChatbotController@listarChatbotsDeAcordoComCursoAluno')->name('chatbot.listarChatbot');
        Route::get('/editar/{id}', 'ChatbotController@redirecionarParaTelaDeEdicao')->name('chatbot.editar');
        Route::post('/alterar/{id}', 'ChatbotController@salvarAlteracao')->name('chatbot.alterar');
        Route::get('/excluir/{id}', 'ChatbotController@excluir')->name('chatbot.excluir');
        Route::post('/cadastrarChatbot', 'ChatbotController@salvarNovoChatBot')->name('chatbot.salvar');
        Route::get('/tinker/{id}', 'BotManController@redirecionarParaView')->name('chatbot.acessarChatBot');
    });
});
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/cadastrar', 'UsuariosController@redirecionarParaTelaDeCadastroUsuario')->name('usuarios.cadastrar');
    Route::get('/listar', 'UsuariosController@listarUsuarios')->name('usuarios.listar');
    Route::get('/editar/{id}', 'UsuariosController@redirecionarParaTelaDeEditar')->name('usuarios.editar');
    Route::post('/alterar/{id}', 'UsuariosController@salvarAlteracao')->name('usuarios.alterar');
    Route::post('/cadastrar', 'UsuariosController@salvarNovoUsuario')->name('usuarios.salvar');
    Route::get('/visualizar/{id}', 'UsuariosController@visualizar')->name('usuarios.visualizar');
    Route::get('/excluir/{id}', 'UsuariosController@excluir')->name('usuarios.excluir');
});

Route::group(['prefix' => 'professors'], function () {
    Route::get('/cadastrar', 'ProfessoresController@cadastrar')->name('professors.cadastrar');
    Route::get('/listar', 'ProfessoresController@listar')->name('professors.listar');
    Route::get('/editar/{id}', 'ProfessoresController@editar')->name('professors.editar');
    Route::post('/alterar/{id}', 'ProfessoresController@alterar')->name('professors.alterar');
    Route::get('/visualizar/{id}', 'ProfessoresController@visualizar')->name('professors.visualizar');
    Route::get('/excluir/{id}', 'ProfessoresController@excluir')->name('professors.excluir');
});

Route::group(['prefix' => 'alunos'], function () {
    Route::get('/cadastrar', 'AlunosController@cadastrar')->name('alunos.cadastrar');
    Route::get('/listar', 'AlunosController@listar')->name('alunos.listar');
    Route::get('/editar/{id}', 'AlunosController@editar')->name('alunos.editar');
    Route::post('/alterar/{id}', 'AlunosController@alterar')->name('alunos.alterar');
    Route::get('/visualizar/{id}', 'AlunosController@visualizar')->name('alunos.visualizar');
    Route::get('/excluir/{id}', 'AlunosController@excluir')->name('alunos.excluir');
});

Route::group(['prefix' => 'curso'], function () {
    Route::get('/cadastrar', 'CursosController@redirecionarTelaCadastro')->name('cursos.cadastrar');
    Route::get('/listar', 'CursosController@listarCursos')->name('cursos.listar');
    Route::get('/editar/{id}', 'CursosController@editarCurso')->name('cursos.editar');
    Route::post('/alterar/{id}', 'CursosController@alterarCurso')->name('cursos.alterar');
    Route::get('/vizualizar/{id}', 'CursosController@visualizarCurso')->name('cursos.visualizar');
    Route::get('/excluir/{id}', 'CursosController@excluirCurso')->name('cursos.excluir');
    Route::post('/cadastrarCurso', 'CursosController@cadastrarCurso')->name('cursos.executarCadastro');
});

Route::group(['prefix' => 'materia'], function () {
    Route::get('/cadastrar', 'MateriaController@redirecionarTelaCadastro')->name('materia.cadastrar');
    Route::get('/listar', 'MateriaController@listarMaterias')->name('materia.listar');
    Route::get('/editar/{id}', 'MateriaController@editarMateria')->name('materia.editar');
    Route::post('/alterar/{id}', 'MateriaController@alterarMateria')->name('materia.alterar');
    Route::get('/vizualizar/{id}', 'MateriaController@visualizarMateria')->name('materia.visualizar');
    Route::get('/excluir/{id}', 'MateriaController@excluirMateria')->name('materia.excluir');
    Route::post('/cadastrarMateria', 'MateriaController@cadastrarMateria')->name('materia.executarCadastro');
});

Route::group(['prefix' => 'duvida'], function () {
    Route::get('/cadastrar', 'DuvidaController@redirecionarTelaCadastro')->name('duvida.cadastrar');
    Route::get('/listar', 'DuvidaController@listarDuvida')->name('duvida.listar');
    Route::get('/listarDuvida/{id}', 'DuvidaController@listarDuvidasPorChatbot')->name('duvida.listarDuvidaChatbot');
    Route::get('/atender/{id}', 'DuvidaController@atenderDuvida')->name('duvida.atender');
    Route::post('/cadastrarDuvida', 'DuvidaController@cadastrarDuvida')->name('duvida.executarCadastro');
});



Route::post('/dadosAluno', 'AlunosController@dadosAluno')->name('dadosAluno');
Route::post('/dadosUsuario', 'UsuariosController@dadosUsuario')->name('dadosUsuario');
Route::post('/dados', 'ProfessoresController@dados')->name('dados');


Route::get('cadastros', 'LoginController@cadastros')->name('cadastros');
Route::get('listagem', 'LoginController@listagem')->name('listagem');
Route::get('venda', 'LoginController@venda')->name('venda');
Route::get('/login', 'LoginController@login')->name('login');

Route::post('/login', 'LoginController@login')->name('login');
Auth::routes();
Route::get('/register', 'Auth\RegisterController@redirecionarParaCad')->name('register');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
