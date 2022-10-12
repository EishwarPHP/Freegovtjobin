<?php

use App\Models\Category;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
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
    $notes=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->orderBy('notifications.created_at','DESC')
        ->where('notifications.setbutton',1)
        ->limit(1)
        ->first();
    $jobnotification=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->orderBy('notifications.created_at','DESC')
        ->where('categories.category','Job Notification')
        ->limit(10)
        ->get();
    $statejobnotification=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->orderBy('notifications.created_at','DESC')
        ->where('categories.category','State Job Notifications')
        ->limit(10)
        ->get();
    $admitcard=Notification::leftjoin('categories','notifications.category','categories.id')
    ->select('categories.id as cid','categories.category as categoryname','notifications.*')
    ->orderBy('notifications.created_at','DESC')
    ->where('categories.category','Admit Cards')
    ->limit(10)
    ->get();
    $results=Notification::leftjoin('categories','notifications.category','categories.id')
    ->select('categories.id as cid','categories.category as categoryname','notifications.*')
    ->orderBy('notifications.created_at','DESC')
    ->where('categories.category','Results')
    ->limit(10)
    ->get();
    $newupdate=Notification::leftjoin('categories','notifications.category','categories.id')
    ->select('categories.id as cid','categories.category as categoryname','notifications.*')
    ->orderBy('notifications.created_at','DESC')
    ->where('notifications.setbutton', 0)
    ->skip(0)->take(5)
    ->get();
    $newupdate1=Notification::leftjoin('categories','notifications.category','categories.id')
    ->select('categories.id as cid','categories.category as categoryname','notifications.*')
    ->orderBy('notifications.created_at','DESC')
    ->where('notifications.setbutton',0)
    ->skip(5)->take(10)
    ->get();
    $box=Notification::leftjoin('categories','notifications.category','categories.id')
    ->select('categories.id as cid','categories.category as categoryname','notifications.*')
    ->where('notifications.setbutton','2')
    ->orderBy('notifications.created_at','DESC')
    ->limit(9)
    ->get();
    // return $notes;
    $category = Category::limit(6)->get();
    return view('welcome', compact('notes','jobnotification','statejobnotification','results','admitcard','newupdate','category','newupdate','newupdate1','box'));
});

// Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'Welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', [App\Http\Controllers\HomeController::class, 'Category'])->name('categories');
Route::post('/addCategory', [App\Http\Controllers\HomeController::class, 'addCategory'])->name('addCategory');
Route::get('/category-edit/{id}', [App\Http\Controllers\HomeController::class, 'CategoryEditpage']);
Route::post('/editCategory', [App\Http\Controllers\HomeController::class, 'editCategory'])->name('editCategory');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\HomeController::class, 'DeleteCategory']);

Route::post('/addNotification', [App\Http\Controllers\HomeController::class, 'addNotification'])->name('addNotification');
Route::get('/notifications', [App\Http\Controllers\HomeController::class, 'Notifications'])->name('notifications');

Route::get('/notifications-view/{id}', [App\Http\Controllers\HomeController::class, 'NotificationsView']);
Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'NotificationsDelete']);

Route::get('/notifications-edit/{id}', [App\Http\Controllers\HomeController::class, 'NotificationsEditPage']);
Route::post('/NotificationsEdit', [App\Http\Controllers\HomeController::class, 'NotificationsEdit'])->name('NotificationsEdit');

Route::get('/details/{id}', [App\Http\Controllers\DetailsController::class, 'NotificationsViewforUsers']);
Route::post('/Subscriptions', [App\Http\Controllers\DetailsController::class, 'Subscriptions'])->name('Subscriptions');
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'ChangePasswordPage']);
Route::post('/ChangePassword', [App\Http\Controllers\HomeController::class, 'ChangePassword'])->name('ChangePassword');

Route::get('/subscribers', [App\Http\Controllers\HomeController::class, 'SubscribersPage'])->name('subscribers');
Route::get('/deleteSubscribe/{id}', [App\Http\Controllers\HomeController::class, 'DeleteSubscribe']);

Route::get('/welcome-category/{title}', [App\Http\Controllers\DetailsController::class, 'WelcomeCategory']);
Route::get('/contact', [App\Http\Controllers\DetailsController::class, 'ContactPage'])->name('contact');
Route::post('/ContactPost', [App\Http\Controllers\DetailsController::class, 'ContactPost'])->name('ContactPost');

Route::get('/enquiry', [App\Http\Controllers\HomeController::class, 'Enquiry'])->name('enquiry');
Route::get('/deleteEnquiry/{id}', [App\Http\Controllers\HomeController::class, 'DeleteEnquiry']);




