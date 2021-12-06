<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLearningController;
use App\Http\Controllers\CourseTechnologyController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\TechnologyController;
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

Route::get('/technology-management-url-add', function () {
    return view('add-technology');
});
Route::get('/technology-management-url-edit', function () {
    return view('edit-technology');
});


Route::get('/course-management-url-add', function () {
    return view('add-course');
});
Route::get('/course-management-url-edit', function () {
    return view('edit-course');
});



// Route::get('/course-technologies-management-url-add', function () {
//     return view('add-course-technologies');
// });

Route::get('/course-technologies-management-url-edit', function () {
    return view('edit-course-tecnology');
});



Route::get('/course-learning-management-url-edit', function () {
    return view('edit-course-learning');
});



Route::get('/home', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard',[CourseController::class,'index'])->name('dashboard')->middleware(['auth:sanctum', 'verified']);

Route::get('/course-management',[CourseController::class,'indexCourse'])->name('course')->middleware(['auth:sanctum', 'verified']);
Route::post('/add-course',[CourseController::class,'addCourse'])->name('addcourse')->middleware(['auth:sanctum', 'verified']);
Route::get('/add-course',[CourseController::class,'refreshCourse'])->name('refreshCourse')->middleware(['auth:sanctum', 'verified']);
Route::get('/edit-course',[CourseController::class,'editCourse'])->name('editcourse')->middleware(['auth:sanctum', 'verified']);
Route::get('/',[CourseController::class,'getAllCourses'])->name('getAllCourses')->middleware(['auth:sanctum', 'verified']);
Route::get('/course/{id}',[CourseController::class,'showCourse'])->name('showCourse')->middleware(['auth:sanctum', 'verified']);
Route::get('/view-course',[CourseController::class,'getAllCoursesTable'])->name('getAllCoursesTable')->middleware(['auth:sanctum', 'verified']);





Route::get('/course-learning-management',[CourseLearningController::class,'index'])->name('courselearningmanagement')->middleware(['auth:sanctum', 'verified']);
Route::post('/add-course-learning',[CourseLearningController::class,'addCourseLearning'])->name('addcourseLearning')->middleware(['auth:sanctum', 'verified']);
Route::get('/add-course-learning',[CourseLearningController::class,'getCourse'])->name('getCourse')->middleware(['auth:sanctum', 'verified']);
Route::get('/edit-course-learning',[CourseLearningController::class,'editCourseLearning'])->name('editcourseLearning')->middleware(['auth:sanctum', 'verified']);


Route::get('/course-technologies-management',[CourseTechnologyController::class,'index'])->name('coursemanagement')->middleware(['auth:sanctum', 'verified']);
Route::post('/add-course-technology',[CourseTechnologyController::class,'addCourseTechnology'])->name('addcourseTechnology')->middleware(['auth:sanctum', 'verified']);
Route::get('/add-course-technology',[CourseTechnologyController::class,'getCourseTechnology'])->name('getCourseTechnology')->middleware(['auth:sanctum', 'verified']);
Route::get('/edit-course-technology',[CourseTechnologyController::class,'editCourseTechnology'])->name('editcourseTechnology')->middleware(['auth:sanctum', 'verified']);


Route::get('/welcome',[EnquiryController::class,'index'])->name('welcome')->middleware(['auth:sanctum', 'verified']);
Route::post('/add-enquiry',[EnquiryController::class,'addCourseEnquiry'])->name('addCourseEnquiry')->middleware(['auth:sanctum', 'verified']);
Route::get('/view-enquiry',[EnquiryController::class,'viewCourseEnquiry'])->name('viewcourseEnquiry')->middleware(['auth:sanctum', 'verified']);
Route::get('/edit-enquiry',[EnquiryController::class,'editCourseEnquiry'])->name('editcourseEnquiry')->middleware(['auth:sanctum', 'verified']);
Route::get('/checkout/{id}',[EnquiryController::class,'checkout'])->name('checkout')->middleware(['auth:sanctum', 'verified']);


Route::get('/technology-management',[TechnologyController::class,'index'])->name('technologymanagement')->middleware(['auth:sanctum', 'verified']);
Route::post('/add-technology',[TechnologyController::class,'addCourseTechnology'])->name('addcourseTechnology')->middleware(['auth:sanctum', 'verified']);
Route::get('/add-technology',[TechnologyController::class,'refreshTechnology'])->name('refreshTechnology')->middleware(['auth:sanctum', 'verified']);
Route::get('/edit-technology',[TechnologyController::class,'editCourseTechnology'])->name('editcourseTechnology')->middleware(['auth:sanctum', 'verified']);
Route::get('/getall-technology',[TechnologyController::class,'getAllTechnology'])->name('getallTechnology')->middleware(['auth:sanctum', 'verified']);


