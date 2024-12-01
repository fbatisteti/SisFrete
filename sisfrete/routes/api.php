<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutosCategoriaController;
use App\Http\Controllers\PedidosProdutoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('clientes', ClienteController::class);
// Route::apiResource('pedidos', PedidoController::class);
// Route::apiResource('pagamentos', PagamentoController::class);
// Route::apiResource('produtos', ProdutoController::class);
// Route::apiResource('categorias', CategoriaController::class);
// Route::apiResource('produtos-categorias', ProdutosCategoriaController::class);
// Route::apiResource('pedidos-produtos', PedidosProdutoController::class);

Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::put('/clientes/editar/{id}', [ClienteController::class, 'update']);
Route::put('/clientes/ativar/{id}', [ClienteController::class, 'ativar']);
Route::put('/clientes/inativar/{id}', [ClienteController::class, 'inativar']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

Route::get('/pedidos', [PedidoController::class, 'index']);
Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
Route::post('/pedidos', [PedidoController::class, 'store']);
// Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);

Route::get('/pagamentos', [PagamentoController::class, 'index']);
Route::get('/pagamentos/{id}', [PagamentoController::class, 'show']);
Route::post('/pagamentos', [PagamentoController::class, 'store']);
Route::put('/pagamentos/editar/{id}', [PagamentoController::class, 'update']);
Route::put('/pagamentos/pago/{id}', [PagamentoController::class, 'pago']);
Route::put('/pagamentos/pendente/{id}', [PagamentoController::class, 'pendente']);
Route::delete('/pagamentos/{id}', [PagamentoController::class, 'destroy']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::put('/produtos/editar/{id}', [ProdutoController::class, 'update']);
Route::put('/produtos/ativar/{id}', [ProdutoController::class, 'ativar']);
Route::put('/produtos/inativar/{id}', [ProdutoController::class, 'inativar']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::put('/categorias/editar/{id}', [CategoriaController::class, 'update']);
Route::put('/categorias/ativar/{id}', [CategoriaController::class, 'ativar']);
Route::put('/categorias/inativar/{id}', [CategoriaController::class, 'inativar']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

Route::get('/produtos-categorias', [ProdutosCategoriaController::class, 'index']);
// Route::get('/produtos-categorias/{id}', [ProdutosCategoriaController::class, 'show']);
Route::get('/produtos-categorias/produtos/{id}', [ProdutosCategoriaController::class, 'showByProduto']);
Route::get('/produtos-categorias/categorias/{id}', [ProdutosCategoriaController::class, 'showByCategoria']);
Route::post('/produtos-categorias', [ProdutosCategoriaController::class, 'store']);
Route::post('/produtos-categorias/multi', [ProdutosCategoriaController::class, 'storeMultiple']);
// Route::put('/produtos-categorias/{id}', [ProdutosCategoriaController::class, 'update']);
Route::delete('/produtos-categorias/{id}', [ProdutosCategoriaController::class, 'destroy']);

Route::get('/pedidos-produtos', [PedidosProdutoController::class, 'index']);
Route::get('/pedidos-produtos/{id}', [PedidosProdutoController::class, 'show']);
Route::get('/pedidos-produtos/produto/{id}', [PedidosProdutoController::class, 'showByProduto']);
// Route::post('/pedidos-produtos', [PedidosProdutoController::class, 'store']);
// Route::put('/pedidos-produtos/{id}', [PedidosProdutoController::class, 'update']);
// Route::delete('/pedidos-produtos/{id}', [PedidosProdutoController::class, 'destroy']);