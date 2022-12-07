<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportSheet;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HistoriqueRoleController;


Route::get('/', function() { return View('welcome'); });
Route::get('/',[ImportSheet::class,'index'])->name('home');
Route::post('Import',[ImportSheet::class, 'import'])->name('sheet.importdata');
Route::post('Log',[LoginController::class, 'logUser'])->name('LoginUser');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/store',[HistoriqueRoleController::class, 'store'])->name('historique');
