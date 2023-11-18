<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BookClosingController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ParentUserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RecurringBillingController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPermissionController;
use App\Http\Controllers\TeacherController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('billings', BillingController::class);
Route::resource('book-closings', BookClosingController::class);
Route::resource('discounts', DiscountController::class);
Route::resource('parent-users', ParentUserController::class);
Route::resource('payments', PaymentController::class);
Route::resource('recurring-billings', RecurringBillingController::class);
Route::resource('school-years', SchoolYearController::class);
Route::resource('student-attendances', StudentAttendanceController::class);
Route::resource('student-classes', StudentClassController::class);
Route::apiResource('students', StudentController::class);
Route::resource('student-permissions', StudentPermissionController::class);
Route::resource('teachers', TeacherController::class);

Route::get('parent/children', [ParentUserController::class, 'listChildren']);
Route::get('payments/today', [PaymentController::class, 'listPaymentsForToday']);
Route::post('recurring-billings/add', [RecurringBillingController::class, 'addRecurringBilling']);
Route::get('students/{studentId}/attendance', [StudentAttendanceController::class, 'listStudentAttendance']);
Route::get('class/{classId}/students', [StudentController::class, 'listStudentsInClass']);
Route::put('students/{studentId}/change-class', [StudentClassController::class, 'changeStudentClass']);
Route::get('students/no-unpaid-bills', [StudentController::class, 'listStudentsWithNoUnpaidBills']);
Route::post('students/{studentId}/request-permission', [StudentPermissionController::class, 'requestPermission']);
Route::get('students/{studentId}/bills', [BillingController::class, 'listBillsForStudent']);
Route::get('bills/{billId}/class/{classId}/students', [BillingController::class, 'listStudentsInClassForBill']);

Route::get('payments/specific-day', [PaymentController::class, 'listPaymentsForSpecificDay']);
//GET /api/payments/specific-day?date=2023-01-15

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth', 'parent'])->group(function () {
    // Routes for parent users
});
