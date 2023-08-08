<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard',[UserController::class,'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('save/chat',[UserController::class,'saveChat']);
Route::post('load/chat',[UserController::class,'loadChat']);
Route::post('delete/chat',[UserController::class,'deleteChat']);

///group
Route::get('/groups',[UserController::class,'loadgroups'])->middleware(['auth', 'verified'])->name('groups');

Route::post('create/group',[UserController::class,'createGroup'])->middleware(['auth', 'verified'])->name('groups.save');


Route::post('get/members',[UserController::class,'getMembers'])->middleware(['auth', 'verified'])->name('members.save');



// Route::post('/save/members',[UserController::class,'addMembers'])->middleware(['auth', 'verified']);


Route::post('save/members',[UserController::class,"addMember"])->middleware(['auth', 'verified']);

Route::post('/delete-group',[UserController::class,"deleteGroup"])->middleware(['auth', 'verified']);

Route::get('/group-Chats',[UserController::class,"groupChats"])->middleware(['auth', 'verified'])->name('groupChats');


Route::get('/share-group/{id}',[UserController::class,'shareGroup'])->middleware(['auth', 'verified'])->name('shareGroup');

Route::post('/join-group',[UserController::class,"joinGroup"])->middleware(['auth', 'verified']);

Route::post('/save-group/chats',[UserController::class,"saveGroupChat"])->middleware(['auth', 'verified']);

Route::post('/load-group/chats',[UserController::class,"loadGroupChats"])->middleware(['auth', 'verified']);



require __DIR__.'/auth.php';
