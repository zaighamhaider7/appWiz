<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\analyticsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\TaskManagmentController;
use App\Http\Controllers\taskChatController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
Route::get('/',[Home::class,'index']);

Route::get('/dashboard', function () {
    return view('client.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/setting', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::delete('/setting', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/setting/{id}', [ProfileController::class, 'delDevice'])->name('profile.deleteDevice');
    Route::post('/settings', [RolesController::class, 'addRoles'])->name('roles.add');
    

Route::get('/projects', [ProjectController::class, 'create'])->name('project.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
Route::post('/projects/status', [ProjectController::class, 'projectStatus']);



Route::post('/projects/milestone', [ProjectController::class, 'milestoneStore'])->name('milestone.store');
Route::post('/milestone/status', [ProjectController::class, 'milestoneStatus']);



Route::get('/analytics',[analyticsController::class,'index'])->name('analytics');
Route::get('/earnings-data', [analyticsController::class, 'earningsData']);
Route::get('/device-type-data',[AnalyticsController::class,'deviceTypeData']);
Route::get('/traffic-data',[AnalyticsController::class,'traffic']);
});


require __DIR__.'/auth.php';



Route::get('/view-project/{id}', [ProjectController::class, 'view_edit'])->name('project.view');

Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');



Route::post('/projects/project-id', [ProjectController::class, 'projectId']);
Route::post('/edit-project', [ProjectController::class, 'edit'])->name('project.edit');
Route::post('/project/delete', [ProjectController::class, 'Deleteproject']);
Route::get('/project/list', [ProjectController::class, 'projectList']);


Route::post('/milestone/milestone-id', [ProjectController::class, 'milestoneId']);
Route::post('/milestone/edit-milestone', [ProjectController::class, 'editMilestone'])->name('milestone.edit');
Route::post('/milestone/delete', [ProjectController::class, 'Deletemilestone']);
Route::post('/milestone/list', [ProjectController::class, 'list']);

Route::post('project/document', [ProjectController::class, 'documentId']);
Route::post('document/delete', [ProjectController::class, 'deleteDocument']);
Route::post('/document/list', [ProjectController::class, 'Documentlist']);
Route::post('/documents', [ProjectController::class, 'uploadDocument'])->name('document.store');


Route::get('/clients', [ClientsController::class, 'ClientView'])->name('clients');
Route::post('/clients', [ClientsController::class, 'ClientStore'])->name('client.store');
Route::delete('/clients/{id}', [ClientsController::class, 'ClientDelete'])->name('clients.delete');
Route::post('/clients/{id}', [ClientsController::class, 'ClientDetails'])->name('clients.details');


Route::get('/leads', [LeadsController::class, 'LeadsView'])->name('leads');
Route::post('/leads', [LeadsController::class, 'LeadsStore'])->name('lead.store');
Route::post('leads/{id}', [LeadsController::class, 'LeadsUpdate'])->name('lead.update');
Route::delete('leads/{id}', [LeadsController::class, 'LeadsDelete'])->name('lead.delete');


Route::get('/task_management',[TaskManagmentController::class,'TaskView'])->name('task.view');
Route::post('/task_management',[TaskManagmentController::class,'TaskStore'])->name('task.store');
Route::post('task_management/update-task', [TaskManagmentController::class, 'singletaskUpdate'])->name('single.update');
Route::post('/task_management/task_status',[TaskManagmentController::class, 'taskStatus_store'])->name('taskStatus.store');

Route::delete('task_management/{id}', [TaskManagmentController::class, 'TaskDelete'])->name('task.delete');
Route::post('task_management/update/{id}', [TaskManagmentController::class, 'taskUpdate'])->name('task.update');
Route::get('/task_management/edit/{id}', [TaskManagmentController::class, 'taskEdit'])->name('task.edit');

Route::post('/task_management/task_status',[TaskManagmentController::class, 'taskStatus_store'])->name('taskStatus.store');



Route::post('/task_management/taskChats', [taskChatController::class, 'taskId'])->name('task.id');
Route::post('/task/chat/upload-image', [TaskChatController::class, 'uploadImage'])->name('task.chat.upload_image');
Route::post('/task_management/taskChatsStore', [taskChatController::class, 'taskChat'])->name('task.chat');
Route::get('/task_management/getTaskChats/{taskId}', [TaskChatController::class, 'getTaskChats']);
// Route::get('/task_management/chatsCount', [TaskChatController::class, 'chatsCount']);
