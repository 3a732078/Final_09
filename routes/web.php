<?php

use App\Models\carry;
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


#guest
    Route::get('/', function () {
        return view('guest');
    });

    Route::post('/',function(){
    })->name('guest.store');

#boss
    Route::get('boss/index',
        [\App\Http\Controllers\BossController::class,
    'index'])->name('boss.index');

    Route::patch('boss/index/{id}',
        [\App\Http\Controllers\BossController::class,
    'update'])->name('boss.index.update');

    Route::patch('boss/index/{id}/increse',
        [\App\Http\Controllers\BossController::class,
    'increse'])->name('boss.index.increse');

    Route::patch('boss/index/{id}/decrese',
        [\App\Http\Controllers\BossController::class,
    'decrese'])->name('boss.index.decrese');

    Route::get('boss/carry',
        [\App\Http\Controllers\BossController::class,
    'carry'])->name('boss.carry');



#car
    Route::get('boss/car',
        [\App\Http\Controllers\CarController::class,
    'index'])->name('boss.car');

    Route::patch('boss/car/{id}/increse',
        [\App\Http\Controllers\CarController::class,
    'increse'])->name('boss.index.increse');

    Route::patch('boss/car/{id}/decrese',
        [\App\Http\Controllers\CarController::class,
    'decrese'])->name('boss.index.decrese');

    Route::patch('boss/car/{id}',
        [\App\Http\Controllers\CarryController::class,
    'update'])->name('boss.car.update');

#carry
    Route::get('boss/carry',
        [\App\Http\Controllers\CarryController::class,
    'store']) -> name('carry.store');

#admin
    Route::get('admin/index',[
        \App\Http\Controllers\AdminController::class,
        'index'])->name('admin.index');

    Route::get('admin/carry',[
        \App\Http\Controllers\AdminController::class,
        'carry'])->name('admin.carry');

    Route::patch('admin/carry/{id}',[
        \App\Http\Controllers\AdminController::class,
        'update'])->name('admin.carry.edit');



    Route::get('admin/create',[
        \App\Http\Controllers\AdminController::class,
        'create'
    ])->name('admin.create');

    Route::post('admin/store',[
        \App\Http\Controllers\AdminController::class,
        'store'
    ])->name('admin.store');

    Route::patch('admin/edit/{id}',[
        \App\Http\Controllers\AdminController::class,
        'edit'
    ])->name('admin.edit');

    Route::post('admin/update',[
        \App\Http\Controllers\AdminController::class,
        'update'])->name('admin.update');

    Route::delete('admin/index/{id}',[
        \App\Http\Controllers\AdminController::class,
    'destroy'
    ])->name('admin.destroy');


#middleware
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return redirect('boss/index');
    })->name('dashboard');
