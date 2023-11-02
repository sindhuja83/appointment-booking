<?php

namespace App\Http\Controllers;

use App\Mail\DoctorAppointmentNotification;
use App\Mail\PatientAppointmentNotification;
use App\Models\AppointmentBooking;
use App\Models\Timeslots;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

    class BookingController extends Controller
    {
        
        public function appointmentList()
        {
            $appointments = AppointmentBooking::with('user.userDetails', 'user', 'timeslot')->paginate(10);
            return view('admin.timeslots.appointmentlist', compact('appointments'));
        }

        public function profile()
        {
            $user = Auth::user();
            $appointments = AppointmentBooking::with('user.userdetails', 'user', 'timeslot')
                ->where('user_id_from', $user->id)
                ->paginate(10);
        
            return view('user.userprofile', compact('user', 'appointments'));
        }
        


        public function storeAppointment(Request $request)
        {        
            $request->validate([
                'user_id_from' => 'required',  
                'user_id_to' => 'required',    
                'time_slot_id' => 'required',
                'date' => 'required|date',
                'status' => 'required',
            ]);

            $appointment = new AppointmentBooking();
            $appointment->user_id_from = $request->input('user_id_from');
            $appointment->user_id_to = $request->input('user_id_to');
            $appointment->time_slot_id = $request->input('time_slot_id');
            $appointment->date = $request->input('date');
            $appointment->status = $request->input('status');
            $appointment->save(); 

            $patient = User::find($request->input('user_id_from'));
            $doctor = User::find($request->input('user_id_to'));

            Mail::to('sindhuja.p@arkinfotec.com')->send(new PatientAppointmentNotification($appointment, $patient, $doctor));
            Mail::to('sindhuja.p@arkinfotec.com')->send(new DoctorAppointmentNotification($appointment, $patient, $doctor));
        
            return redirect()->back()
            ->with('success', 'Appointment Booked successfully');
        }

        public function getDoctorTimeSlots($doctorId)
        {
            $doctorTimeSlots = Timeslots::whereHas('availability.user', function ($query) use ($doctorId) {
                $query->where('id', $doctorId);
            })->get();

            return response()->json($doctorTimeSlots);
        }

    }
