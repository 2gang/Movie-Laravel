<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ExmovieController;
use App\Http\Controllers\AdminmovieController;
use App\Http\Controllers\AdminexmovieController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\AdmindirectorController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\AdminactorController;
use App\Http\Controllers\AdminroomController;
use App\Http\Controllers\AdminstoreController;
use App\Http\Controllers\AdminruntimeController;
use App\Http\Controllers\AdminscheduleController;
use App\Http\Controllers\AdminmemberController;
use App\Http\Controllers\TicketingController;
use App\Http\Controllers\StoreController;
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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/admin', function () {
    return view('main_admin');
});


Route::resource('member', MemberController::class);
Route::resource('movie', MovieController::class);
Route::resource('ex_movie', ExmovieController::class);
Route::resource('admin_movie', AdminmovieController::class);
Route::resource('admin_ex_movie', AdminexmovieController::class);
Route::resource('director', DirectorController::class);
Route::resource('admin_director', AdmindirectorController::class);
Route::resource('actor', ActorController::class);
Route::resource('admin_actor', AdminactorController::class);
Route::resource('admin_room', AdminroomController::class);
Route::resource('admin_store', AdminstoreController::class);
Route::resource('admin_runtime', AdminruntimeController::class);
Route::resource('admin_schedule', AdminscheduleController::class);
Route::resource('admin_member', AdminmemberController::class);
Route::resource('ticketing', TicketingController::class);
Route::resource('store', StoreController::class);

Route::post('home/check', [HomeController::class,'check']);

Route::get('home/logout', [HomeController::class,'logout']);

Route::resource('home', HomeController::class);

