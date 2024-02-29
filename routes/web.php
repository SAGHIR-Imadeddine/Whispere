<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Friend_requistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PusherController;
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
Route::post('/pusher/auth', [PusherController::class, 'authenticate']);
Route::get('/chatt', [PusherController::class, 'index'])->name('chat');
Route::post('/broadcast', [PusherController::class, 'broadcast']);
Route::post('/receive', [PusherController::class, 'receive']);

Route::post('/broadcast-location', [PusherController::class, 'broadcastLocation']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'decodeQr'])->name('profile.decodeQr');
    Route::post('/SearchByLink', [ProfileController::class, 'searchByUrl'])->name('check-cache');
    // Route::post('/conversation', [PusherController::class, 'show'])->name('conversation.show');

    // Route::post('/conversation', [ConversationController::class, 'show'])->name('conversation.show');
});

// Route::get('/chat', [ConversationController::class, 'index'])->name('chat');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::post('/friendRequest/{user}', [Friend_requistController::class, 'friendRequest'])->name('friendRequest');

Route::delete('/remove-friend-request/{user}', [Friend_requistController::class, 'removeFriendRequest'])->name('remove.friend.request');

Route::post('/conversation', [ConversationController::class, 'show'])->name('conversation.show');

// Route::get('/chat', [ConversationController::class, 'index'])->name('chat');
// Socialite Routes
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


Route::get('/showrequests', [AcceptrequestController::class, 'friendRequestsPage'])->name('show.requests');
Route::delete('/showrequests/{requestId}/{action}', [AcceptrequestController::class, 'refuseFriendRequest'])->name('delete.requests');
// Route::post('/showrequests/{requestId}/accept',  [AcceptrequestController::class, 'refuseFriendRequest'])->name('accept.requests');


// Route for accepting or deleting friend request
Route::post('/accept-or-delete-request/{friendRequest}/{status}', [AcceptrequestController::class, 'acceptOrDeleteRequest'])->name('accept.or.delete.request');


Route::get('/search', [userController::class, 'search'])->name('search');
Route::post('/friendRequest/{user}', [Friend_requistController::class, 'friendRequest'])->name('friendRequest');

Route::delete('/remove-friend-request/{user}', [Friend_requistController::class, 'removeFriendRequest'])->name('remove.friend.request');



require __DIR__ . '/auth.php';
