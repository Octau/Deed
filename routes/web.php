<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [ProjectController::class, 'recruit']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return redirect($to = route('project.index'));
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix'=>'project', 'middleware'=>'auth', 'as'=>'project.'], function () {
    Route::get('/',[ProjectController::class, 'index'])->name('index');
    Route::get('/add',[ProjectController::class, 'add'])->name('add');
    Route::post('/save', [ProjectController::class, 'save'])->name('save');
});



require __DIR__.'/auth.php';
