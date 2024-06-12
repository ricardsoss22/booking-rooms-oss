<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminRoomController;
use App\Http\Controllers\admin\AdminReserveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\RoomController;
use App\Http\Controllers\User\ReserveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin route
Route::middleware('auth')->group(function(){
    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/room',[AdminRoomController::class, 'index'])->name('admin.room');
    Route::get('/admin/room/create',[AdminRoomController::class, 'create'])->name('admin.room.create');
    Route::post('/admin/room',[AdminRoomController::class, 'store'])->name('admin.room.store');
    Route::get('/admin/room/edit/{id}', [AdminRoomController::class, 'edit'])->name('admin.room.edit');
    Route::patch('/admin/room', [AdminRoomController::class, 'update'])->name('admin.room.update');
    Route::delete('/admin/room/{id}', [AdminRoomController::class, 'destroy'])->name('admin.room.destroy');
    Route::get('/admin/reserve',[AdminReserveController::class, 'index'])->name('admin.reserve');
    Route::patch('/admin/reserve/accept/{id}', [AdminReserveController::class, 'accept'])->name('admin.reserve.accept');
    Route::delete('/admin/reserve/decline/{id}', [AdminReserveController::class, 'decline'])->name('admin.reserve.decline');
});

//user route

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard');
    Route::get('/room',[RoomController::class, 'index'])->name('user.room');
    Route::get('/room/{id}/show',[RoomController::class, 'show'])->name('user.room.show');
    Route::post('/room/show/reserve/{id}',[RoomController::class, 'store'])->name('user.reserve.store');
    // reserve show
    Route::get('/reserve',[ReserveController::class, 'index'])->name('user.reserve');
    Route::get('/reserve/{reservation}/edit', [ReserveController::class, 'edit'])->name('user.reserve.edit');
    Route::put('/reserve/{reservation}', [ReserveController::class, 'update'])->name('user.reserve.update');
    Route::delete('/reserve/{reservation}', [ReserveController::class, 'destroy'])->name('user.reserve.destroy');
    Route::post('/reserve/feedback/{room_id}', [ReserveController::class, 'feedback'])->name('user.reserve.feedback');
});

require __DIR__.'/auth.php';
