<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\HomeController;


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
    return view('welcome');
});*/

Route::get('/', [ParticipanteController::class, 'index'])->name('home');



Auth::routes();

// Participante Routes
Route::middleware(['auth','user-role:participante'])->group(function(){
    Route::get("/home",[HomeController::class,'userHome'])->name('home');

});

// Organizador Route
Route::middleware(['auth','user-role:organizador'])->group(function()
{
    Route::get("/organizador/home",[HomeController::class,'organizadorHome'])->name('home.organizador');
});

// Admin Routes
Route::middleware(['auth','user-role:admin'])->group(function(){
    //Route::get("/admin/home",[HomeController::class,'adminHome'])->name('home.admin');
    Route::get('/admin', [AdministradorController::class, 'index'])->name('home.admin');
    Route::get('/admin/users', [AdministradorController::class, 'users'])->name('admin.users');

    Route::get('/admin/events', [AdministradorController::class, 'events'])->name('admin.events');
    Route::get('/admin/event/{id}', [AdministradorController::class, 'event'])->name('admin.event');
    Route::get('/admin/event/create', [AdministradorController::class, 'new_event'])->name('admin.event.new');
    Route::post('/admin/event/create', [AdministradorController::class, 'create_event'])->name('admin.event.create');
    Route::get('/admin/event/edit/{id}', [AdministradorController::class, 'edit_event'])->name('admin.event.edit');
    Route::post('/admin/event/edit', [AdministradorController::class, 'update_event'])->name('admin.event.update');
    
});