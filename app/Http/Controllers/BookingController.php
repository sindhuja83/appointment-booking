<?php

namespace App\Http\Controllers;

use App\Mail\DoctorAppointmentNotification;
use App\Mail\PatientAppointmentNotification;
use App\Models\AppointmentBooking;
use App\Models\Userdetails;
use App\Models\Timeslots;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

    class BookingController extends Controller
    {

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

        public function profile()
        {
            $user = Auth::user();
            $appointments = AppointmentBooking::with('user.userdetails', 'user', 'timeslot')
                ->where('user_id_from', $user->id)
                ->paginate(10);
        
            return view('user.userprofile', compact('user', 'appointments'));
        }

        public function getDoctorTimeSlots(Request $request, $doctorId)
        {
            $selectedDate = $request->input('date');
        
            $doctorTimeSlots = Timeslots::whereHas('availability', function ($query) use ($doctorId, $selectedDate) {
                $query->where('user_id', $doctorId)->where('date', $selectedDate);
            })->get();
        
            return response()->json($doctorTimeSlots);
        }        


public function appointmentList(Request $request)
{
    if ($request->ajax()) {
        $query = AppointmentBooking::with(['user.userDetails', 'user', 'timeslot'])
            ->orderBy('date', 'desc');

        return DataTables::of($query)
            ->addColumn('patient_name', function ($appointment) {
                return $appointment->users->user_name;
            })
            ->addColumn('doctor_name', function ($appointment) {
                return $appointment->user->user_name;
            })
            ->addColumn('specialist', function ($appointment) {
                $doctor = Userdetails::where('user_id', $appointment->user_id_to)->first();
                return $doctor ? $doctor->specialist : 'N/A';
            })
            ->addColumn('time_slot', function ($appointment) {
                return $appointment->timeslot->start_time . ' - ' . $appointment->timeslot->end_time;
            })
            ->addColumn('date', function ($appointment) {
                return $appointment->date;
            })
            ->addColumn('status', function ($appointment) {
                return $appointment->status;
            })
            ->rawColumns(['specialist'])
            ->make(true);
    }

    return view('admin.timeslots.appointmentlist');
}

    


    }
