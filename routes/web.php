<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

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

route::get('/template', function() {
    return view('template');
});

Route::resource('siswas', SiswaController::class);
Route::resource('kelas', KelasController::class);
Route::resource('petugas', PetugasController::class);

// Route::get('/kelas','KelasController@edit');
// Route::get('/kelas/edit/{id}','KelasController@edit');
// Route::get('/kelas/create','KelasController@edit');

Route::resource('orders', OrderController::class)->only(['index', 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
