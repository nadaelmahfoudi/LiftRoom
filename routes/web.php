<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('Dashboard');
Route::get('/AboutUs', [AboutusController::class, 'index'])->name('AboutUs');
Route::get('/ContactUs', [ContactusController::class, 'index'])->name('ContactUs');
Route::get('/Profile', [ProfileController::class, 'index'])->name('Profile');



Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::resource('exercices', ExerciceController::class);
Route::get('/exercices', [ExerciceController::class, 'index'])->name('exercices');
Route::get('/Exercises', [ExerciceController::class, 'showExercises'])->name('Exercises');


Route::resource('sessions', SessionController::class);

Route::resource('skills', SkillController::class);

Route::resource('programmes', ProgrammeController::class);
Route::get('/', [ProgrammeController::class, 'showProgramme'])->name('welcome');

Route::post('/abonnements', [AbonnementController::class, 'store'])->name('abonnements.store');

Route::post('/Profile', [ProfileController::class, 'update'])->name('profile.update');