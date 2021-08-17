<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\ProductController;


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

/*Route::get('/', function () {
    return 'Olá mundo!';
});
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');



Route::get('/sobrenos', [SobreNosController::class, 'sobre'])->name('site.sobrenos');


Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/contato/{name}/{taxid}/{password?}', function (string $name, string $taxid, string $password = 'senha não informada!') {

    echo "kkk eae men: $name  - $taxid - $password";
})->where('password', '[0-9]+')->where('name', '[A-Za-z]+');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');



Route::middleware('log.acesso','autenticacao:padrao, rooi julia néh')->prefix('/app')->group(
    function () {
        Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
        Route::get('/home', [HomeController::class, 'index'])->name('app.home');
        Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');

        /*Route::get('/produto', [ProductController::class, 'index'])->name('app.produto');
        Route::get('/produto/create', [ProductController::class, 'create'])->name('app.produto.create');*/
       
        //produtos
        Route::resource('produto', ProductController::class);

        //produtos detalhes

        Route::resource('produto-detalhe', ProdutoDetalheController::class);

        Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

        Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
        Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
        Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
        Route::get('/fornecedor/excluir{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
        
    }

);

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');



Route::fallback(function () {

    echo 'Anota acessada não existe. <a href= "' . route('site.index') . '">Clique aqui</a> para ir para a página inicial';
});



  
/* verbo http

get
post
put
patch
delete
options

*/
