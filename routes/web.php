<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\FornecedorController;

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

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');



Route::get('/sobrenos', [SobreNosController::class, 'sobre'])->name('site.sobrenos');


Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/contato/{name}/{taxid}/{password?}', function (string $name, string $taxid, string $password = 'senha não informada!') {

    echo "kkk eae men: $name  - $taxid - $password";
})->where('password', '[0-9]+')->where('name', '[A-Za-z]+');

Route::get('/login', function () {
    return 'login';
})->name('site.login');


Route::prefix('/app')->group(
    function () {

        Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedor');
        Route::get('/produtos', function () {return 'produtos';})->name('app.produtos');
        Route::get('/clientes', function () {return 'clientes';})->name('app.clientes');
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
