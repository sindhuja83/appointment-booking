<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\timeslotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\UserAppointmentController;
// Route::get('/', function () {
//     return view('welcome');
// });

//ADMIN ROUTES
Route::get('/admin/login',[adminController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[adminController::class,'postLogin'])->name('postLogin');
Route::get('/admin/logout',[adminController::class,'logout'])->name('logout');
Route::get('/admin/dashboard',[adminController::class,'dashboard'])->name('dashboard');

// Route::get('/admin/dashboard', function(){
//     return view('dashboard');
// })->middleware(['auth','role:Admin'])->name('dashboard');

//USERS
Route::get('create', [UserController::class, 'create'])->name('create');
Route::get('userlist', [UserController::class, 'show'])->name('userlist');
Route::post('storeso', [UserController::class, 'store'])->name('storeuser');
Route::get('getusers', [UserController::class, 'getUsers'])->name('datatables.users');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('edituser');
Route::put('users/', [UserController::class, 'update'])->name('updateuser');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('deleteuser');

//Availability Management
Route::get('timeslot', [timeslotController::class, 'createTimeslot'])->name('timeslot');
Route::get('slotlist', [timeslotController::class, 'showTimeslot'])->name('slotlist');
Route::post('storeTimeSlot', [timeslotController::class, 'storeTimeSlot'])->name('storeTimeSlot');
Route::get('doctor-availabilities', [timeslotController::class,'getDoctorAvailabilities'])->name('datatables.doctor-availabilities');

//REGISTERATION
Route::get('login',[registerController::class,'login'])->name('registerLogin');
Route::post('login',[registerController::class,'loggedin'])->name('userLogin');
Route::get('logout',[registerController::class,'userlogout'])->name('userlogout');
Route::get('/register', [registerController::class, 'create'])->name('register');
Route::post('store', [registerController::class, 'store'])->name('store');
Route::get('/', [registerController::class, 'show'])->name('homepage');

//Appointment Booking 
Route::get('/appointments/create', [BookingController::class, 'createAppointment'])->name('appointments.create');
Route::get('/doctors/{doctorId}/timeslots', [BookingController::class, 'getDoctorTimeSlots']);
Route::post('/appointments', [BookingController::class, 'storeAppointment'])->name('appointments.store');
Route::get('/appointment', [BookingController::class, 'appointmentList'])->name('appointment.listing');
Route::get('/profile', [BookingController::class, 'profile'])->name('profile');
Route::get('appointments/data', [BookingController::class, 'showAppointment'])->name('appointments.data');

//Full calendar
Route::get('doctors/appointments', [eventController::class, 'getEvent'])->name('getEvents');
Route::post('/createevent', [eventController::class, 'createEvent'])->name('createevent');
Route::post('/deleteevent', [eventController::class, 'deleteEvent'])->name('deleteevent');
Route::get('patients/appointments', [UserAppointmentController::class, 'getAppointment'])->name('getAppointment');
Route::post('/createappointment', [UserAppointmentController::class, 'createAppointment'])->name('createappointment');
Route::post('/deleteappointment', [UserAppointmentController::class, 'deleteEvent'])->name('deleteappointment');







