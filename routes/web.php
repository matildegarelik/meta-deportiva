<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\OrganizationsController;
use Illuminate\Support\Facades\Mail;

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
Route::get('/events', [ParticipanteController::class, 'events'])->name('participante.events');
Route::get('/event-detail/{id}', [ParticipanteController::class, 'event'])->name('participante.event');



Auth::routes();

// Participante Routes
Route::middleware(['auth','user-role:participante'])->group(function(){
    Route::get('/home', [ParticipanteController::class, 'index'])->name('home');
    Route::get('/event-register/{id}', [ParticipanteController::class, 'registration_form'])->name('participante.registration_form');
    Route::post('/event-register/', [ParticipanteController::class, 'register'])->name('participante.save_register');
    Route::get('/schedule', [ParticipanteController::class, 'schedule'])->name('participante.schedule');
    Route::get('/profile/', [ParticipanteController::class, 'profile'])->name('participante.profile');
    Route::post('/profile/', [ParticipanteController::class, 'update_profile'])->name('participante.save_profile');
    Route::get('/upcoming', [ParticipanteController::class, 'upcoming'])->name('participante.upcoming');
    Route::get('/validar-cupon/{cupon}',[ParticipanteController::class, 'validar_cupon'])->name('participante.validar_cupon');
    Route::get('/questions-view/{id}',[ParticipanteController::class, 'questions_view'])->name('participante.questions_view');
});

// Organizador Route
Route::middleware(['auth','user-role:organizador'])->group(function(){
    Route::get("/organizador/home",[HomeController::class,'organizadorHome'])->name('home.organizador');
    Route::get("/organizador/events",[EventsController::class,'organizador_events'])->name('organizador.events');
});

Route::middleware(['auth','user-role:admin,organizador'])->group(function(){
    Route::get('/admin/event-detail/{id}', [EventsController::class, 'event'])->name('admin.event');
    Route::get('/admin/event/edit/{id}', [EventsController::class, 'edit_event'])->name('admin.event.edit');
    Route::post('/admin/event/edit', [EventsController::class, 'update_event'])->name('admin.event.update');
    Route::get('/admin/event/delete/{id}', [EventsController::class, 'delete_event'])->name('admin.event.delete');
    
    Route::post('/admin/event/new-category', [EventsController::class, 'new_category'])->name('admin.event.new_category');
    Route::post('/admin/event/update-category', [EventsController::class, 'update_category'])->name('admin.event.update_category');
    Route::get('/admin/event/delete-category/{id}', [EventsController::class, 'delete_category'])->name('admin.event.delete_category');
    
    Route::post('/admin/event/new-cupon', [EventsController::class, 'new_cupon'])->name('admin.event.new_cupon');
    Route::post('/admin/event/update-cupon', [EventsController::class, 'update_cupon'])->name('admin.event.update_cupon');
    Route::get('/admin/event/delete-cupon/{id}', [EventsController::class, 'delete_cupon'])->name('admin.event.delete_cupon');
    
    Route::post('/admin/event/new-question', [EventsController::class, 'new_question'])->name('admin.event.new_question');
    Route::post('/admin/event/update-question', [EventsController::class, 'update_question'])->name('admin.event.update_question');
    Route::get('/admin/event/delete-question/{id}', [EventsController::class, 'delete_question'])->name('admin.event.delete_question');

    Route::post('/admin/event/new-sponsor', [EventsController::class, 'new_sponsor'])->name('admin.event.new_sponsor');
    Route::post('/admin/event/update-sponsor', [EventsController::class, 'update_sponsor'])->name('admin.event.update_sponsor');
    Route::get('/admin/event/delete-sponsor/{id}', [EventsController::class, 'delete_sponsor'])->name('admin.event.delete_sponsor');
    
    Route::get('/admin/inscripcion/{id}', [EventsController::class, 'inscripcion'])->name('admin.inscripcion');
    Route::get('/admin/event/delete-inscripcion/{id}', [EventsController::class, 'delete_inscripcion'])->name('admin.event.delete_inscripcion');
    
});

// Admin Routes
Route::middleware(['auth','user-role:admin'])->group(function(){
    //Route::get("/admin/home",[HomeController::class,'adminHome'])->name('home.admin');
    Route::get('/admin', [AdministradorController::class, 'index'])->name('home.admin');
    Route::get('/admin/users', [AdministradorController::class, 'users'])->name('admin.users');

    Route::get('/admin/events', [EventsController::class, 'index'])->name('admin.events');
    Route::get('/admin/events/create', [EventsController::class, 'new_event'])->name('admin.event.new');
    Route::post('/admin/event/create', [EventsController::class, 'create_event'])->name('admin.event.create');
   
    Route::get('/admin/organizations', [OrganizationsController::class, 'index'])->name('admin.organizations');
    Route::get('/admin/organization-detail/{id}', [OrganizationsController::class, 'organization'])->name('admin.organization');
    Route::get('/admin/organizations/create', [OrganizationsController::class, 'new_organization'])->name('admin.organization.new');
    Route::post('/admin/organizations/create', [OrganizationsController::class, 'create_organization'])->name('admin.organization.create');
    Route::get('/admin/organizations/delete/{id}', [OrganizationsController::class, 'delete_organization'])->name('admin.organization.delete');
    Route::get('/admin/organization/edit/{id}', [OrganizationsController::class, 'edit_organization'])->name('admin.organization.edit');
    Route::post('/admin/organization/edit', [OrganizationsController::class, 'update_organization'])->name('admin.organization.update');
    Route::post('/admin/organization/add-organizer', [OrganizationsController::class, 'create_organizer'])->name('admin.organization.register_organizer');
    Route::post('/admin/organization/update-organizer', [OrganizationsController::class, 'update_organizer'])->name('admin.organization.update_organizer');
    Route::get('/admin/organization/delete-organizer/{id}', [OrganizationsController::class, 'delete_organizer'])->name('admin.organization.delete_organizer');
});
/*Route::get('send_test_email', function(){
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
	{
		$message->subject('Subject');
        $message->to('garelikmatilde@gmail.com');
	});
});*/