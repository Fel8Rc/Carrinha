<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [siteController::class, 'index'])->name('site.index');
Route::get('/produto/{produto}', [siteController::class, 'details'])->name('site.details');
Route::get('categoria/{categoria}', [siteController::class, 'categoria'])->name('site.categoria');

//Route::resource('produtos', ProdutoController::class);
//Route::resource('users', UserController::class);

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionarcarrinho'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removercarrinho'])->name('site.remcarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizarcarrinho'])->name('site.atualizarcarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparcarrinho'])->name('site.limparcarrinho');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [loginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [loginController::class, 'logout'])->name('login.logout');
Route::get('/register', [loginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('/admin/produto/delete/{produto}', [ProdutoController::class, 'destroy'])->name('admin.produto.delete');
Route::post('/admin/produto/store', [ProdutoController::class, 'store'])->name('admin.produto.store');
