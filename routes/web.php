<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::get('/events/{Events}/view', [EventController::class, 'view'])->name('event.view');
Route::get('/events/create', [EventController::class, 'create'])->name('event.create');
Route::post('/events', [EventController::class, 'store'])->name('event.store');
Route::get('/events/{event}/edit', [EventController::class,'edit'])->name('event.edit');
Route::put('/events/{event}/update', [EventController::class,'update'])->name('event.update');
Route::delete('/events/{event}/destroy', [EventController::class,'destroy'])->name('event.destroy');

