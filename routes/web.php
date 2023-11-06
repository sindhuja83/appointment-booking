<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserAppointmentController;

// ADMIN ROLE
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/create', [UserController::class, 'create'])->name('create');
    Route::post('/admin/storeso', [UserController::class, 'store'])->name('storeuser');
    Route::get('/admin/getusers', [UserController::class, 'getUsers'])->name('datatables.users');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('edituser');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('updateuser');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('deleteuser');

});

//DOCTOR ROLE
Route::middleware(['auth', 'role:Doctor'])->group(function () {
    Route::get('/doctor/timeslot', [TimeslotController::class, 'createTimeslot'])->name('timeslot');
    Route::get('/doctor/appointments', [EventController::class, 'getEvent'])->name('getEvents');
    Route::post('/doctor/createevent', [EventController::class, 'createEvent'])->name('createevent');
    Route::post('/doctor/deleteevent', [EventController::class, 'deleteEvent'])->name('deleteevent');

});

// COMMON TO BOTH ADMIN|DOCTOR
Route::middleware(['auth', 'role:Admin|Doctor'])->group(function () {
    Route::get('/admin/login',[AdminController::class,'getLogin'])->name('getLogin');
    Route::post('/admin/login',[AdminController::class,'postLogin'])->name('postLogin');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('logout');
    Route::get('/admin/userlist', [UserController::class, 'show'])->name('userlist');
    Route::get('/doctor/timeslot', [TimeslotController::class, 'createTimeslot'])->name('timeslot');
    Route::get('/doctor/slotlist', [TimeslotController::class, 'showTimeslot'])->name('slotlist');
    Route::post('/doctor/storeTimeSlot', [TimeslotController::class, 'storeTimeSlot'])->name('storeTimeSlot');
    Route::delete('/delete-doctor-availability/{id}', [TimeslotController::class,'deleteDoctorAvailability'])->name('deleteDoctorAvailability');
    Route::get('doctor-availabilities', [TimeslotController::class,'getDoctorAvailabilities'])->name('datatables.doctor-availabilities');
    Route::get('/appointment', [BookingController::class, 'appointmentList'])->name('appointment.listing');

});

// PATIENT ROLE
Route::middleware(['authuser', 'role:Patient'])->group(function () {
    Route::get('/', [RegisterController::class, 'show'])->name('homepage');
    Route::get('/patient/login',[RegisterController::class,'login'])->name('registerLogin');
    Route::post('/patient/login',[RegisterController::class,'loggedin'])->name('userLogin');
    Route::get('/patient/logout',[RegisterController::class,'userlogout'])->name('userlogout');
    Route::get('/patient/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/patient/store', [RegisterController::class, 'store'])->name('store');
    Route::get('/patient/appointments/create', [BookingController::class, 'createAppointment'])->name('appointments.create');
    Route::get('/patient/{doctorId}/timeslots', [BookingController::class, 'getDoctorTimeSlots']);
    Route::post('/patient/appointments', [BookingController::class, 'storeAppointment'])->name('appointments.store');
    Route::get('/patient/profile', [BookingController::class, 'profile'])->name('profile');
    Route::get('/patient/appointments/data', [BookingController::class, 'showAppointment'])->name('appointments.data');
    Route::get('/patient/appointments/list', [BookingController::class, 'appointmentList'])->name('appointments.list');
    Route::get('/patient/fetch-time-slots', [BookingController::class, 'fetchTimeSlots'])->name('fetch.time.slots');
    Route::get('/patients/appointments', [UserAppointmentController::class, 'getAppointment'])->name('getAppointment');
    Route::post('/patients/createappointment', [UserAppointmentController::class, 'createAppointment'])->name('createappointment');    
    
});




