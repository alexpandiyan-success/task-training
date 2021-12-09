<?php

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLearningController;
use App\Http\Controllers\CourseTechnologyController;
use App\Http\Controllers\courseTitleController;
use App\Http\Controllers\courseTitleDetailController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\TechnologyController;
use App\Models\Degree;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\specializtionController;
use App\Models\Specializtion;

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



Route::get('/add-degrees', function () {
    return view('add-degree');
});

Route::get('/add-colleges', function () {
    return view('add-college');
});




Route::get('/home', function () {
    return view('welcome');
});



Route::get('/dashboard', [CourseController::class, 'index'])->name('dashboard')->middleware(['auth:sanctum', 'verified', 'isAdmin']);

Route::get('/course-management', [CourseController::class, 'indexCourse'])->name('course')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-course', [CourseController::class, 'addCourse'])->name('addcourse')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/add-course', [CourseController::class, 'refreshCourse'])->name('refreshCourse')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/edit-course', [CourseController::class, 'editCourse'])->name('editcourse')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/', [CourseController::class, 'getAllCourses'])->name('getAllCourses')->middleware(['auth:sanctum', 'verified', 'isUser']);
Route::get('/course/{id}', [CourseController::class, 'showCourse'])->name('showCourse')->middleware(['auth:sanctum', 'verified', 'isUser']);
Route::get('/view-course', [CourseController::class, 'getAllCoursesTable'])->name('getAllCoursesTable')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/course-learning-management', [CourseLearningController::class, 'index'])->name('courselearningmanagement')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-course-learning', [CourseLearningController::class, 'addCourseLearning'])->name('addcourseLearning')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/add-course-learning', [CourseLearningController::class, 'getCourse'])->name('getCourse')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/edit-course-learning', [CourseLearningController::class, 'editCourseLearning'])->name('editcourseLearning')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/course-technologies-management', [CourseTechnologyController::class, 'index'])->name('coursemanagement')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-course-technology', [CourseTechnologyController::class, 'addCourseTechnology'])->name('addcourseTechnology')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/add-course-technology', [CourseTechnologyController::class, 'getCourseTechnology'])->name('getCourseTechnology')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/edit-course-technology', [CourseTechnologyController::class, 'editCourseTechnology'])->name('editcourseTechnology')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/welcome', [EnquiryController::class, 'index'])->name('welcome')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-enquiry', [EnquiryController::class, 'addCourseEnquiry'])->name('addCourseEnquiry')->middleware(['auth:sanctum', 'verified', 'isUser']);
Route::get('/view-enquiry', [EnquiryController::class, 'viewCourseEnquiry'])->name('viewcourseEnquiry')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/view-rejectedenquiry', [EnquiryController::class, 'viewRejectedCourseEnquiry'])->name('viewRejectedCourseEnquiry')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/aproove/{id}', [EnquiryController::class, 'aprooveCourseEnquiry'])->name('aprooveCourseEnquiry')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-enquiry-approve', [EnquiryController::class, 'approve'])->name('approve')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/view-approveddata', [EnquiryController::class, 'approvedData'])->name('approvedData')->middleware(['auth:sanctum', 'verified', 'isAdmin']);




Route::get('/edit-enquiry', [EnquiryController::class, 'editCourseEnquiry'])->name('editcourseEnquiry')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/checkout/{id}', [EnquiryController::class, 'checkout'])->name('checkout')->middleware(['auth:sanctum', 'verified', 'isUser']);

Route::get('/reject/{id}', [EnquiryController::class, 'reject'])->name('reject')->middleware(['auth:sanctum', 'verified', 'isAdmin']);



Route::get('/technology-management', [TechnologyController::class, 'index'])->name('technologymanagement')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-technology', [TechnologyController::class, 'addCourseTechnology'])->name('addcourseTechnology')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/add-technology', [TechnologyController::class, 'refreshTechnology'])->name('refreshTechnology')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/edit-technology', [TechnologyController::class, 'editCourseTechnology'])->name('editcourseTechnology')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/getall-technology', [TechnologyController::class, 'getAllTechnology'])->name('getallTechnology')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/get-all-course', [CollegeController::class, 'index'])->name('index')->middleware(['auth:sanctum', 'verified', 'isAdmin']);

Route::post('/add-degree', [DegreeController::class, 'store'])->name('store')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/view-degrees', [DegreeController::class, 'index'])->name('index')->middleware(['auth:sanctum', 'verified', 'isAdmin']);

Route::post('/add-college', [CollegeController::class, 'store'])->name('store')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/view-colleges', [CollegeController::class, 'index'])->name('index')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/view-specializtions', [specializtionController::class, 'index'])->name('index')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::POST('/add-specializtions', [specializtionController::class, 'store'])->name('store')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/add-specializtions', [specializtionController::class, 'AddSpecializtions'])->name('Addspecializtions')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/add-coursetitle', [courseTitleController::class, 'AddCourseTitle'])->name('Addcoursetitle')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-coursetitle', [courseTitleController::class, 'store'])->name('store')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/view-coursetitle', [courseTitleController::class, 'index'])->name('index')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/add-coursetitledetails', [courseTitleDetailController::class, 'AddCourseTitleDetails'])->name('Addcoursetitledetails')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::post('/add-coursetitledetails', [courseTitleDetailController::class, 'store'])->name('store')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/view-coursetitledetails', [courseTitleDetailController::class, 'index'])->name('index')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/pay-now', [EnquiryController::class, 'getEnquiry'])->name('getenquiry')->middleware(['auth:sanctum', 'verified', 'isAdmin']);

Route::post('/add-pay-now', [paymentController::class, 'store'])->name('store')->middleware(['auth:sanctum', 'verified', 'isAdmin']);
Route::get('/add-pay-now', [paymentController::class, 'store'])->name('store')->middleware(['auth:sanctum', 'verified', 'isAdmin']);


Route::get('/get-pending-payemt', [EnquiryController::class, 'getPendingPayment'])->name('getpendingpayment')->middleware(['auth:sanctum', 'verified', 'isAdmin']);

Route::get('/get-completed-payemt', [EnquiryController::class, 'getCompletedPayment'])->name('getCompletedPayment')->middleware(['auth:sanctum', 'verified', 'isAdmin']);

Route::get('/payment-management', function () {
    return view('payment-management');
});

