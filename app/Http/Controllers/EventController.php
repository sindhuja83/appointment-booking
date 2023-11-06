<?php

namespace App\Http\Controllers;

use App\Models\AppointmentBooking;
use Illuminate\Http\Request;

class EventController extends Controller
{

        public function getEvent(Request $request)
        {
        if ($request->ajax()) {
        $start = $request->input("start", ''); 
        $end = $request->input("end", '');

        $doctorId = auth()->user()->id;


        $events = AppointmentBooking::with(['user', 'timeslot'])
            ->where('user_id_to', $doctorId)
            ->whereBetween('date', [$start, $end])
            ->get();
            
        $formattedEvents = [];

        foreach ($events as $event) {
            $formattedEvents[] = [
                'id' => $event->id,
                'title' => $event->users->user_name,
                'start' => $event->date . ' ' . $event->timeslot->start_time,
                'end' => $event->date . ' ' . $event->timeslot->end_time,
            ];
        }

        return response()->json($formattedEvents);
        }
        return view('admin.calender');
        }


        public function createEvent(Request $request)
        {
            $data = [
                'title' => $request->input('title'),
                'start' => $request->input('start'),
                'end' => $request->input('end')
            ];

            $event = AppointmentBooking::create($data);

            return response()->json($event);
        }
  

        public function deleteEvent(Request $request)
        {
        $event= AppointmentBooking::find($request->id);
        return $event->delete();
        }

}
