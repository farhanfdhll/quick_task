<?php

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
    return redirect()->route('home');
});

Auth::routes();

// Guest route(s)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::group(['prefix'=>'admin','middleware'=>'admin', 'as'=>'admin.'], function(){
        // Admin only route(s)
        Route::get('/manage-users', [\App\Http\Controllers\AdminController::class, 'manageUsersPage'])->name('manageUsersPage');
        Route::get('/manage-users/promote/{user}', [\App\Http\Controllers\UserController::class, 'promote'])->name('promoteUser');
        Route::get('/manage-users/demote/{user}', [\App\Http\Controllers\UserController::class, 'demote'])->name('demoteUser');
        Route::get('/manage-users/delete/{user}', [\App\Http\Controllers\UserController::class, 'delete'])->name('deleteUser');
    });
    // Member and admin route(s)
    Route::get('/view-profile', [\App\Http\Controllers\UserController::class, 'viewProfilePage'])->name('viewProfilePage');
    Route::post('/updateprofile/{user}', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateUserProf');
    Route::get('/change-password', [App\Http\Controllers\UserController::class, 'cpPage'])->name('changePassword');
    Route::post('/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword');

    Route::group(['prefix'=>'member','middleware'=>'member', 'as'=>'member.'], function(){
        // Member only
        Route::get('/add-task', [\App\Http\Controllers\TaskController::class, 'addTaskPage'])->name('add-task-page');
        Route::get('/remove-task/{task}', [\App\Http\Controllers\TaskController::class, 'delete'])->name('removeTask');
        Route::get('/edit-task/{task}', [\App\Http\Controllers\TaskController::class, 'editTaskPage'])->name('edit-task-page');
        Route::post('/edit-task/{task}/update', [\App\Http\Controllers\TaskController::class, 'update'])->name('updateTask');
        Route::get('/mark-priority-task/{task}', [\App\Http\Controllers\TaskController::class, 'markPriority'])->name('markPriority');
        Route::get('/mark-status-done/{task}', [\App\Http\Controllers\TaskController::class, 'markStatusDone'])->name('markStatusDone');
        Route::get('/mark-status-progress/{task}', [\App\Http\Controllers\TaskController::class, 'markStatusProgress'])->name('markStatusProgress');
        Route::post('/add-task/add', [\App\Http\Controllers\TaskController::class, 'store'])->name('add-new-task');
    });

});
