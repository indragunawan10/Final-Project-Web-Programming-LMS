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

Route::get('/', [App\Http\Controllers\Controller::class, 'homePage']);
Route::post('/search', [App\Http\Controllers\Controller::class, 'search']);

Route::post('/searchCourse', [App\Http\Controllers\Controller::class, 'searchCourse'])->middleware('isMember');

Route::get('/register', [App\Http\Controllers\Controller::class, 'registerPage'])->middleware('isGuest');
Route::post('/register',[App\Http\Controllers\UserController::class, 'register'])->middleware('isGuest');

Route::get('/login', [App\Http\Controllers\Controller::class, 'loginPage'])->middleware('isGuest');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->middleware('isGuest');

Route::get('/profile', [App\Http\Controllers\Controller::class, 'profilePage'])->middleware('isNotGuest');
Route::post('/update-name', [App\Http\Controllers\UserController::class, 'updateName'])->middleware('isNotGuest');

Route::get('/change-password', [App\Http\Controllers\Controller::class, 'changePasswordPage'])->middleware('isNotGuest');
Route::post('/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->middleware('isNotGuest');

Route::get('/insert-category', [App\Http\Controllers\CategoryController::class, 'getCategory'])->middleware('isAdmin');
Route::post('/insert-category', [App\Http\Controllers\CategoryController::class, 'insertCategory'])->middleware('isAdmin');
Route::get('/view-details-category/{id}', [App\Http\Controllers\CategoryController::class, 'getDetail'])->middleware('isAdmin');
Route::put('/update-category/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('category.update')->middleware('isAdmin');
Route::delete('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('category.delete')->middleware('isAdmin');

Route::get('/insert-course', [App\Http\Controllers\CourseController::class, 'getCourse'])->middleware('isAdmin');
Route::post('insert-course', [App\Http\Controllers\CourseController::class, 'insertCourse'])->middleware('isAdmin');
Route::put('/update-course/{id}', [App\Http\Controllers\CourseController::class, 'updateCourse'])->name('course.update')->middleware('isAdmin');
Route::delete('/delete-course/{id}', [App\Http\Controllers\CourseController::class, 'deleteCourse'])->name('course.delete')->middleware('isAdmin');

Route::get('/cart', [App\Http\Controllers\Controller::class, 'cartPage'])->middleware('isMember');
Route::get('/checkout/{id}', [App\Http\Controllers\TransactionController::class, 'checkout'])->middleware('isMember');
Route::get('/delete-cart-item/{id}', [App\Http\Controllers\TransactionController::class, 'deleteItem'])->middleware('isMember');

Route::get('/course', [App\Http\Controllers\Controller::class, 'allCourse'])->middleware('isMember');

Route::get('/course-details/{id}', [App\Http\Controllers\CourseController::class, 'getCourseDetails']);
Route::get('/my-course-details/{id}', [App\Http\Controllers\CourseController::class, 'getMyCourseDetails']);
Route::post('/add-to-cart/{id}', [App\Http\Controllers\TransactionController::class, 'addToCart'])->middleware('isMember');

Route::get('/book-details/{id}', [App\Http\Controllers\BookController::class, 'getBookDetails']);
Route::post('/add-to-cart/{id}', [App\Http\Controllers\TransactionController::class, 'addToCart'])->middleware('isMember');

Route::get('/transaction-history', [App\Http\Controllers\Controller::class, 'transactionHistoryPage'])->middleware('isMember');
Route::get('/transaction-details/{id}', [App\Http\Controllers\TransactionController::class, 'transactionDetailsPage'])->middleware('isMember');

Route::get('/view-user', [App\Http\Controllers\UserController::class, 'viewListUser'])->middleware('isAdmin');
Route::delete('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('user.delete')->middleware('isAdmin');
Route::get('/view-details-user/{id}', [App\Http\Controllers\UserController::class, 'getDetailUser'])->middleware('isAdmin');
Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class, 'updateUser'])->middleware('isAdmin');

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->middleware('isNotGuest');
