<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\IssueResolveController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ResolveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WinnerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(IssueController::class)->prefix('issues')->group(function () {
    Route::get('/', 'index')->name('issues.index');
    Route::get('/pending', 'pendingIndex')->name('issues.pendingIndex');
    Route::get('/running', 'runningIndex')->name('issues.runningIndex');
    Route::get('/done', 'doneIndex')->name('issues.doneIndex');
    Route::get('/myUploaded/{user_id}', 'myUploaded')->name('issues.myUploaded');
    Route::get('/mySolved/{user_id}', 'mySolved')->name('issues.mySolved');
    Route::get('/myBidded/{user_id}', 'myBidded')->name('issues.myBidded');
    Route::get('/create', 'create')->name('issues.create');
    Route::delete('/delete/{issue_id}', 'delete')->name('issues.delete');
    Route::post('/', 'store')->name('issues.store');
});

Route::controller(RoleController::class)->prefix('roles')->group(function () {
    Route::get('/', 'index')->name('roles.index');    
    Route::get('/create', 'create')->name('roles.create');
    Route::delete('/delete/{role_id}', 'delete')->name('roles.delete');
    Route::post('/', 'store')->name('roles.store');
});

Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'index')->name('users.index');    
    Route::get('/create', 'create')->name('users.create');
    Route::delete('/delete/{user_id}', 'delete')->name('users.delete');
    Route::post('/', 'store')->name('users.store');
});

Route::controller(CenterController::class)->prefix('centers')->group(function () {
    Route::get('/', 'index')->name('centers.index');    
    Route::get('/create', 'create')->name('centers.create');
    Route::delete('/delete/{center_id}', 'delete')->name('centers.delete');
    Route::post('/', 'store')->name('centers.store');
});

Route::controller(BidController::class)->prefix('bids')->group(function () {
    Route::get('/', 'index')->name('bids.index'); 
    Route::get('/showBids/{issue_id}', 'showBids')->name('bids.showBids');   
    Route::get('/create', 'create')->name('bids.create');
    Route::delete('/delete/{bid_id}', 'delete')->name('bids.delete');
    Route::post('/', 'store')->name('bids.store');
});

Route::controller(WinnerController::class)->prefix('winners')->group(function () {
    Route::get('/', 'index')->name('winners.index');    
    Route::get('/create', 'create')->name('winners.create');
    Route::delete('/delete/{winner_id}', 'delete')->name('winners.delete');
    Route::post('/', 'store')->name('winners.store');
});

Route::controller(ResolveController::class)->prefix('resolves')->group(function () {
    Route::get('/', 'index')->name('resolves.index');    
    Route::get('/create', 'create')->name('resolves.create');
    Route::delete('/delete/{resolve_id}', 'delete')->name('resolves.delete');
    Route::post('/', 'store')->name('resolves.store');
});

Route::controller(IssueResolveController::class)->prefix('issueResolves')->group(function () {
    Route::get('/', 'index')->name('issueResolves.index');    
    Route::get('/create', 'create')->name('issueResolves.create');
    Route::delete('/delete/{issueResolve_id}', 'delete')->name('issueResolves.delete');
    Route::post('/', 'store')->name('issueResolves.store');
});

Route::controller(NotificationController::class)->prefix('notifications')->group(function () {
    Route::get('/', 'index')->name('notifications.index');    
    Route::get('/create', 'create')->name('notifications.create');
    Route::delete('/delete/{notification_id}', 'delete')->name('notifications.delete');
    Route::post('/', 'store')->name('notifications.store');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/resolving-now', [ResolveController::class, 'resolvingNow'])->name('resolving_now');
Route::get('/task-to-assign', [IssueController::class, 'tasksToAssign'])->name('task_to_assign');
