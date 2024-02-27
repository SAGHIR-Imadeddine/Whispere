<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Friend_requistController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcceptrequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConversationController;

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
Route::get('/chat', [ConversationController::class, 'index'])->name('chat');
// Socialite Routes
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


Route::get('/showrequests', [AcceptrequestController::class, 'friendRequestsPage'])->name('show.requests');
Route::delete('/showrequests/{requestId}/{action}', [AcceptrequestController::class, 'refuseFriendRequest'])->name('delete.requests');
// Route::post('/showrequests/{requestId}/accept',  [AcceptrequestController::class, 'refuseFriendRequest'])->name('accept.requests');


// Route for accepting or deleting friend request
Route::post('/accept-or-delete-request/{friendRequest}/{status}', [AcceptrequestController::class, 'acceptOrDeleteRequest'])->name('accept.or.delete.request');



require __DIR__.'/auth.php';
//////////////search//////////////////////

Route::get('/search', [userController::class, 'search'])->name('search');
Route::post('/friendRequest/{user}', [Friend_requistController::class, 'friendRequest'])->name('friendRequest');

Route::delete('/remove-friend-request/{user}', [Friend_requistController::class, 'removeFriendRequest'])->name('remove.friend.request');



require __DIR__ . '/auth.php';
