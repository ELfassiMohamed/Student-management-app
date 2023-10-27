<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelControlller;
use App\Http\Controllers\DemandeControlller;
use App\Http\Controllers\ImportExportController;



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


//-----------------------HOME ROUTE-----------------//
Route::view('/', 'auth.login')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'backnotallowed']);
Route::fallback(function () {
  return view('notfound');
});


//-------------Student ROUTE---------------//
Route::get('stdprofile', 'StudentController@show')->name('student.stdprofile');
Route::put('update-student/{id}', [App\Http\Controllers\StudentController::class, 'update']);
Route::get('stdprop', 'StudentController@show_prop')->name('student.stdprop')->middleware(['auth', 'backnotallowed']);
Route::post('store_demande', 'DemandeController@store_demande')->name('stdprop.store_demande');
Route::get('notification', 'Notification@suivi_demande')->name('student.notification')->middleware(['auth', 'backnotallowed']);

//--------------------Prof-Gest ROUTE---------------------------//
Route::get('chefdep', 'ProfCntroller@show')->name('enseignant.chefdep')->middleware(['auth', 'backnotallowed']);
Route::get('props', 'PropsController@show')->name('enseignant.props')->middleware(['auth', 'backnotallowed']);
Route::resource('prof', PropositionController::class)->middleware(['auth', 'backnotallowed']);
Route::get('dashboard', 'ProfCntroller@show_prof')->name('prof.dashboard')->middleware(['auth', 'backnotallowed']);
Route::get('demande', 'DemandeController@afficher_demande')->name('prof.demande');
Route::put('demande-update/{id}', [App\Http\Controllers\DemandeController::class, 'update']);
Route::put('proposition-update/{id}', [App\Http\Controllers\PropositionController::class, 'update']);
Route::get('edit-proposition/{id}', [App\Http\Controllers\PropositionController::class, 'edit']);
Route::put('demande', 'DemandeController@update')->name('demande.update');

// 
Route::get('editer', 'ProfCntroller@show_profile')->name('enseignant.editer');
Route::put('update-user/{id}', [App\Http\Controllers\ProfCntroller::class, 'update']);



Route::get('profile', 'PropsController@show_prof')->name('prof.profile');
Route::put('update-user/{id}', [App\Http\Controllers\PropsController::class, 'update_prof']);



Auth::routes();

//----------------------------ADMIN ROUTE------------------------//
Route::resource('admin', AdminController::class)->except([
  'create', 'edit', 'update'
])->middleware(['auth', 'isAdmin', 'backnotallowed']);
Route::put('admin', 'AdminController@update')->name('admin.update');


//------------------------EXCEL ROUTE-------------------------------//
Route::GET('export', [ExcelControlller::class, 'export'])->name('export');
Route::POST('import', [ExcelControlller::class, 'import'])->name('import');



//---------------------GOOGLE ROUTE----------------//
Route::get('redirect', 'SocialiteController@redirect');
Route::get('callback', 'SocialiteController@callback');





Route::get('/set-visible/{id}', [App\Http\Controllers\ProfCntroller::class, 'setVisible']);
