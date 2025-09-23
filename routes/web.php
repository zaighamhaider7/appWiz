<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\RolesController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
Route::get('/',[Home::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/setting', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/setting', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/setting/{id}', [ProfileController::class, 'delDevice'])->name('profile.deleteDevice');
    Route::post('/settings', [RolesController::class, 'addRoles'])->name('roles.add');
    
Route::get('/projects', [ProjectController::class, 'create'])->name('project.create');

Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');



Route::post('/projects/milestone', [ProjectController::class, 'milestoneStore'])->name('milestone.store');



});


require __DIR__.'/auth.php';


Route::get('/tests', [ProjectController::class, 'testView'])->name('test.create');

Route::post('/tests', [ProjectController::class, 'testStore'])->name('test.store');





Route::get('/view-project/{id}', [ProjectController::class, 'view_edit'])->name('project.view');

// Route::post('/edit-project/{id}', [ProjectController::class, 'edit'])->name('project.edit');


Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');










Route::post('/projects/project-id', [ProjectController::class, 'projectId']);
Route::post('/edit-project', [ProjectController::class, 'edit'])->name('project.edit');


Route::post('/milestone/milestone-id', [ProjectController::class, 'milestoneId']);
Route::post('/milestone/edit-milestone', [ProjectController::class, 'editMilestone'])->name('milestone.edit');
Route::post('/milestone/delete', [ProjectController::class, 'Deletemilestone']);


Route::post('/milestone/list', [ProjectController::class, 'list']);

Route::get('/project/list', [ProjectController::class, 'projectList']);


