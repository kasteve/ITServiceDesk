<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SteveAuthController;
use App\Http\Controllers\IssueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [SteveAuthController::class, 'login']);
Route::get('/registration', [SteveAuthController::class, 'registration']);
Route::post('/register-user', [SteveAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [SteveAuthController::class, 'loginUser'])->name('login-user');
Route::get('/detailed_report', [SteveAuthController::class, 'detailed_report']);
Route::get('/logout', [SteveAuthController::class, 'logout']);
Route::get('/myroute', [SteveAuthController::class, 'myroute'])->name('myroute');
Route::get('/suggestions', [SteveAuthController::class, 'suggestions'])->name('suggestions');
Route::get('/sla', [SteveAuthController::class, 'sla'])->name('sla');
Route::get('/reminders', [IssueController::class, 'reminder'])->name('reminder');


Route::get('add-issue', [IssueController::class, 'newissue'])->name('new-issue');
Route::post('add-issue', [IssueController::class, 'add'])->name('add-issue');
Route::get('/update-issue/{id}', [IssueController::class, 'showUpdateForm'])->name('show-update-issue');
//Route::post('/update-issue/{id}', [IssueController::class, 'update'])->name('update-issue');
Route::post('/update-issue/{id}', [IssueController::class, 'update'])->name('update-issue');
Route::put('/update-issue/{id}', [IssueController::class, 'update'])->name('update-issue');



