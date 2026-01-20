<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\analyticsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\TaskManagmentController;
use App\Http\Controllers\taskChatController;
use App\Http\Controllers\marketplaceController;
use App\Http\Controllers\ticketController;
use App\Http\Controllers\ticketChatsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\billingController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
Route::get('/',[Home::class,'index']);

// Route::get('/dashboard', function () {
//     return view('client.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role_id == 1) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/setting', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::delete('/setting', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/setting/{id}', [ProfileController::class, 'delDevice'])->name('profile.deleteDevice');

    Route::post('/settings', [settingController::class, 'addRoles'])->name('roles.add');

    Route::post('/settings/teammember', [settingController::class, 'singleMember']);

    Route::get('/settings/memeberlist', [settingController::class, 'memeberList']);

    Route::post('/settings/addmember', [settingController::class, 'memberAdd'])->name('member.add');

    Route::post('/settings/updatemember', [settingController::class, 'memberUpdate']);

    Route::post('/settings/deletemember', [settingController::class, 'memberDelete']);

    Route::post('settings/update-notification', [settingController::class, 'update'])->name('notification.update');


    Route::get('/projects', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::post('/projects/status', [ProjectController::class, 'projectStatus']);



    Route::post('/projects/milestone', [ProjectController::class, 'milestoneStore'])->name('milestone.store');
    Route::post('/milestone/status', [ProjectController::class, 'milestoneStatus']);
    Route::post('/milestones/update-status', [ProjectController::class, 'updateStatus']);



    Route::get('/analytics',[analyticsController::class,'index'])->name('analytics');
    Route::post('/analytics',[analyticsController::class,'propertyId'])->name('propertyid');
    Route::get('/earnings-data', [analyticsController::class, 'earningsData']);
    Route::get('/device-type-data',[AnalyticsController::class,'deviceTypeData']);
    Route::get('/traffic-data',[AnalyticsController::class,'traffic']);
    Route::post('/traffic-data-user',[AnalyticsController::class,'trafficUser']);

    Route::post('/session-data', [analyticsController::class, 'sessionDurationData']);
    Route::post('/active-visitors', [analyticsController::class, 'activeVisitorsData']);
    Route::post('/impression-data', [analyticsController::class, 'impressionsData']);
    Route::post('/bounce-rate-data', [analyticsController::class, 'bounceRateData']);
    Route::post('/conversion-rate-data', [analyticsController::class, 'conversionRateData']);
    Route::post('/traffic-by-countries', [analyticsController::class, 'trafficByCountries']);

    // project start

    Route::post('/projects/project-id', [ProjectController::class, 'projectId']);
    Route::post('/edit-project', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/project/delete', [ProjectController::class, 'Deleteproject']);
    Route::get('/project/list', [ProjectController::class, 'projectList']);

    // credentials
    Route::post('/credentials/store', [ProjectController::class, 'Credentialsstore'])
    ->name('credentials.store');

    Route::get('/credentials/list', [ProjectController::class, 'loadCredentails']);

    Route::post('/credentials/delete', [ProjectController::class, 'deleteCredentails']);

    Route::post('/credentials/edit', [ProjectController::class, 'editCredentails']);

    Route::post('/credentials/update', [ProjectController::class, 'updateCredentails']);



    Route::post('/milestone/milestone-id', [ProjectController::class, 'milestoneId']);
    Route::post('/milestone/edit-milestone', [ProjectController::class, 'editMilestone'])->name('milestone.edit');
    Route::post('/milestone/delete', [ProjectController::class, 'Deletemilestone']);
    Route::post('/milestone/list', [ProjectController::class, 'list']);

    Route::post('project/document', [ProjectController::class, 'documentId']);
    Route::post('document/delete', [ProjectController::class, 'deleteDocument']);
    Route::post('/document/list', [ProjectController::class, 'Documentlist']);
    Route::post('/documents', [ProjectController::class, 'uploadDocument'])->name('document.store');

    // client start

    Route::get('/clients', [ClientsController::class, 'ClientView'])->name('clients');
    Route::post('/clients', [ClientsController::class, 'ClientStore'])->name('client.store');
    Route::delete('/clients/{id}', [ClientsController::class, 'ClientDelete'])->name('clients.delete');
    Route::get('/clients/{id}', [ClientsController::class, 'ClientDetails'])->name('clients.details');
    Route::post('/clients/suspend/{id}', [ClientsController::class, 'suspend'])->name('client.suspend');
    Route::get('/get-client-status/{id}', [ClientsController::class, 'getStatus']);
    Route::post('/update-client-status', [ClientsController::class, 'updateStatus']);

    // leads start 

    Route::get('/leads', [LeadsController::class, 'LeadsView'])->name('leads');
    Route::post('/leads', [LeadsController::class, 'LeadsStore'])->name('lead.store');
    Route::post('leads/{id}', [LeadsController::class, 'LeadsUpdate'])->name('lead.update');
    Route::delete('leads/{id}', [LeadsController::class, 'LeadsDelete'])->name('lead.delete');


    // task management start

    Route::get('/task_management',[TaskManagmentController::class,'TaskView'])->name('task.view');
    Route::post('/task_management',[TaskManagmentController::class,'TaskStore'])->name('task.store');
    Route::post('task_management/update-task', [TaskManagmentController::class, 'singletaskUpdate'])->name('single.update');
    Route::post('/task_management/task_status',[TaskManagmentController::class, 'taskStatus_store'])->name('taskStatus.store');

    Route::delete('task_management/{id}', [TaskManagmentController::class, 'TaskDelete'])->name('task.delete');
    Route::post('task_management/update/{id}', [TaskManagmentController::class, 'taskUpdate'])->name('task.update');
    Route::get('/task_management/edit/{id}', [TaskManagmentController::class, 'taskEdit'])->name('task.edit');

    Route::post('task_management/update-task_status', [TaskManagmentController::class, 'taskStatusUpdate'])->name('taskStatus.update');
    Route::post('/task_management/task_status',[TaskManagmentController::class, 'taskStatus_store'])->name('taskStatus.store');
    Route::post('/task_management/task_status/delete/{id}',[TaskManagmentController::class, 'taskStatus_delete'])->name('taskStatus.delete');
    Route::get('/task_management/task_status/edit/{id}',[TaskManagmentController::class, 'taskStatus_edit'])->name('taskStatus.edit');

    Route::post('/task_management/taskChats', [taskChatController::class, 'taskId'])->name('task.id');
    Route::post('/task/chat/upload-image', [TaskChatController::class, 'uploadImage'])->name('task.chat.upload_image');
    Route::post('/task_management/taskChatsStore', [taskChatController::class, 'taskChat'])->name('task.chat');
    Route::get('/task_management/getTaskChats/{taskId}', [TaskChatController::class, 'getTaskChats']);
    Route::post('/task_management/chat/{chatId}/like', [TaskChatController::class, 'toggleLike']);




    // market place start

    Route::get('/marketplace',[marketplaceController::class, 'marketplaceView'])->name('marketplace.view');

    Route::post('/marketplace/subscription',[marketplaceController::class, 'subscriptionStore'])->name('subscription.store');

    Route::post('/marketplace/subscription/delete-id',[marketplaceController::class, 'subscriptionDelete'])->name('subscription.delete');

    Route::post('/marketplace/subscription/detail-id',[marketplaceController::class, 'subscriptionDetail'])->name('subscription.detail');

    Route::post('/marketplace/subscription/edit-id',[marketplaceController::class, 'subscriptionedit'])->name('subscription.edit');

    Route::post('/marketplace/subscription/update-id',[marketplaceController::class, 'subscriptionupdate'])->name('subscription.update');

    // subscription categorie
    Route::post('/marketplace/category',[marketplaceController::class, 'categoryStore'])->name('category.store');


    // ticket start

    Route::get('/tickets',[ticketController::class,'tickView'])->name('ticket.view');
    Route::post('/tickets',[ticketController::class,'tickStore'])->name('ticket.store');
    Route::post('/tickets/status/{id}',[ticketController::class,'ticketStatusUpdate'])->name('ticketStatus.update');


    Route::post('/tickets/ticketChatsStore', [ticketChatsController::class, 'ticketChat'])->name('ticket.chat');
    Route::post('/tickets/chat/upload-image', [ticketChatsController::class, 'uploadImage'])->name('ticket.chat.upload_image');
    Route::get('/tickets/getTicketChats/{ticketId}', [ticketChatsController::class, 'getTicketChats']);
    Route::post('/tickets/chat/{chatId}/like', [ticketChatsController::class, 'toggleLike']);


    // dashboard start

    Route::get('/admin/dashboard',[dashboardController::class,'adminDashboard'])->name('admin.dashboard');

    Route::get('/user/dashboard',[dashboardController::class,'userDashboard'])->name('user.dashboard');

    Route::post('/notifications/{id}/read', function($id) {
        $notification = \App\Models\Notification::find($id);
        if ($notification && $notification->is_read == 0) {
            $notification->is_read = 1;
            $notification->save();
        }

        $unreadCount = \App\Models\Notification::where('is_read', 0)->count();

        return response()->json([
            'success' => true,
            'unreadCount' => $unreadCount
        ]);
    });


    // billing routes
    Route::get('/billing', [billingController::class, 'billingView'])->name('billing');

});


require __DIR__.'/auth.php';



Route::get('/view-project/{id}', [ProjectController::class, 'view_edit'])->name('project.view');

Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');


// // project start

// Route::post('/projects/project-id', [ProjectController::class, 'projectId']);
// Route::post('/edit-project', [ProjectController::class, 'edit'])->name('project.edit');
// Route::post('/project/delete', [ProjectController::class, 'Deleteproject']);
// Route::get('/project/list', [ProjectController::class, 'projectList']);


// Route::post('/milestone/milestone-id', [ProjectController::class, 'milestoneId']);
// Route::post('/milestone/edit-milestone', [ProjectController::class, 'editMilestone'])->name('milestone.edit');
// Route::post('/milestone/delete', [ProjectController::class, 'Deletemilestone']);
// Route::post('/milestone/list', [ProjectController::class, 'list']);

// Route::post('project/document', [ProjectController::class, 'documentId']);
// Route::post('document/delete', [ProjectController::class, 'deleteDocument']);
// Route::post('/document/list', [ProjectController::class, 'Documentlist']);
// Route::post('/documents', [ProjectController::class, 'uploadDocument'])->name('document.store');

// // client start

// Route::get('/clients', [ClientsController::class, 'ClientView'])->name('clients');
// Route::post('/clients', [ClientsController::class, 'ClientStore'])->name('client.store');
// Route::delete('/clients/{id}', [ClientsController::class, 'ClientDelete'])->name('clients.delete');
// Route::post('/clients/{id}', [ClientsController::class, 'ClientDetails'])->name('clients.details');

// // leads start 

// Route::get('/leads', [LeadsController::class, 'LeadsView'])->name('leads');
// Route::post('/leads', [LeadsController::class, 'LeadsStore'])->name('lead.store');
// Route::post('leads/{id}', [LeadsController::class, 'LeadsUpdate'])->name('lead.update');
// Route::delete('leads/{id}', [LeadsController::class, 'LeadsDelete'])->name('lead.delete');


// // task management start

// Route::get('/task_management',[TaskManagmentController::class,'TaskView'])->name('task.view');
// Route::post('/task_management',[TaskManagmentController::class,'TaskStore'])->name('task.store');
// Route::post('task_management/update-task', [TaskManagmentController::class, 'singletaskUpdate'])->name('single.update');
// Route::post('/task_management/task_status',[TaskManagmentController::class, 'taskStatus_store'])->name('taskStatus.store');

// Route::delete('task_management/{id}', [TaskManagmentController::class, 'TaskDelete'])->name('task.delete');
// Route::post('task_management/update/{id}', [TaskManagmentController::class, 'taskUpdate'])->name('task.update');
// Route::get('/task_management/edit/{id}', [TaskManagmentController::class, 'taskEdit'])->name('task.edit');

// Route::post('task_management/update-task_status', [TaskManagmentController::class, 'taskStatusUpdate'])->name('taskStatus.update');
// Route::post('/task_management/task_status',[TaskManagmentController::class, 'taskStatus_store'])->name('taskStatus.store');
// Route::post('/task_management/task_status/delete/{id}',[TaskManagmentController::class, 'taskStatus_delete'])->name('taskStatus.delete');
// Route::get('/task_management/task_status/edit/{id}',[TaskManagmentController::class, 'taskStatus_edit'])->name('taskStatus.edit');

// Route::post('/task_management/taskChats', [taskChatController::class, 'taskId'])->name('task.id');
// Route::post('/task/chat/upload-image', [TaskChatController::class, 'uploadImage'])->name('task.chat.upload_image');
// Route::post('/task_management/taskChatsStore', [taskChatController::class, 'taskChat'])->name('task.chat');
// Route::get('/task_management/getTaskChats/{taskId}', [TaskChatController::class, 'getTaskChats']);
// Route::post('/task_management/chat/{chatId}/like', [TaskChatController::class, 'toggleLike']);




// // market place start

// Route::get('/marketplace',[marketplaceController::class, 'marketplaceView'])->name('marketplace.view');

// Route::post('/marketplace/subscription',[marketplaceController::class, 'subscriptionStore'])->name('subscription.store');

// Route::post('/marketplace/subscription/delete-id',[marketplaceController::class, 'subscriptionDelete'])->name('subscription.delete');

// Route::post('/marketplace/subscription/detail-id',[marketplaceController::class, 'subscriptionDetail'])->name('subscription.detail');

// Route::post('/marketplace/subscription/edit-id',[marketplaceController::class, 'subscriptionedit'])->name('subscription.edit');

// Route::post('/marketplace/subscription/update-id',[marketplaceController::class, 'subscriptionupdate'])->name('subscription.update');

// // subscription categorie
// Route::post('/marketplace/category',[marketplaceController::class, 'categoryStore'])->name('category.store');


// // ticket start

// Route::get('/tickets',[ticketController::class,'tickView'])->name('ticket.view');
// Route::post('/tickets',[ticketController::class,'tickStore'])->name('ticket.store');
// Route::post('/tickets/status/{id}',[ticketController::class,'ticketStatusUpdate'])->name('ticketStatus.update');


// Route::post('/tickets/ticketChatsStore', [ticketChatsController::class, 'ticketChat'])->name('ticket.chat');
// Route::post('/tickets/chat/upload-image', [ticketChatsController::class, 'uploadImage'])->name('ticket.chat.upload_image');
// Route::get('/tickets/getTicketChats/{ticketId}', [ticketChatsController::class, 'getTicketChats']);
// Route::post('/tickets/chat/{chatId}/like', [ticketChatsController::class, 'toggleLike']);


// // dashboard start

// Route::get('/dashboard',[dashboardController::class,'DashboardView'])->name('dashboard');