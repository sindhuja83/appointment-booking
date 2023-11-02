<?php

namespace App\Http\Controllers;

use App\Models\AppointmentBooking;
use Illuminate\Http\Request;

class UserAppointmentController extends Controller
{
    public function getAppointment(Request $request)
    {
    if ($request->ajax()) {
    $start = $request->input("start", ''); 
    $end = $request->input("end", '');

    $patientId = auth()->user()->id;
    $events = AppointmentBooking::with(['user', 'timeslot'])
        ->where('user_id_from', $patientId)
        ->whereBetween('date', [$start, $end])
        ->get();
        
    $formattedEvents = [];

    foreach ($events as $event) {
        $formattedEvents[] = [
            'id' => $event->id,
            'title' => $event->user->user_name,
            'start' => $event->date . ' ' . $event->timeslot->start_time,
            'end' => $event->date . ' ' . $event->timeslot->end_time,
        ];
    }
    return response()->json($formattedEvents);
    }
    return view('user.appointmentCalender');
    }


    public function createAppointment(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end')
        ];

        $event = AppointmentBooking::create($data);

        return response()->json($event);
    }


    public function deleteAppointment(Request $request)
    {
        $event= AppointmentBooking::find($request->id);
        return $event->delete();
    }
}
