<?php

use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcceptrequestController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/chat', function () {
    return view('chat');
})->name('chat');
// Socialite Routes
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


Route::get('/showrequests', [AcceptrequestController::class, 'friendRequestsPage'])->name('show.requests');

// Route for accepting or deleting friend request
Route::post('/accept-or-delete-request/{friendRequest}/{status}', [AcceptrequestController::class, 'acceptOrDeleteRequest'])->name('accept.or.delete.request');



require __DIR__.'/auth.php';
