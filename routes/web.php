<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\trashcontroller;

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
Route::redirect('/', 'siswa');
Route::resource('siswa',siswacontroller::class);
Route::get('trash',[siswacontroller::class, 'trash'])->name('trash');
Route::get('/trash/restore/{id}', [siswacontroller::class, 'restore'])->name('restore');
Route::get('/trash/restoreall', [siswacontroller::class, 'restoreall'])->name('restore.all');
route::get('/trash/delete/{id}', [siswacontroller::class, 'permanentdestroy'])->name('delete');
route::get('/trash/deleteall', [siswacontroller::class, 'permanentdestroyall'])->name('delete.all');

