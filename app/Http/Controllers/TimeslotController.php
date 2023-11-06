<?php

namespace App\Http\Controllers;

use App\Models\DoctorAvailability;
use App\Models\Timeslots;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TimeslotController extends Controller
{
    public function createTimeslot()
    {
        return view('admin.timeslots.createslot');
    }

    public function showTimeslot()
    {
        $doctorAvailabilities = DoctorAvailability::where('user_id', Auth::user()->id)->get();
        return view('admin.timeslots.slotlist', compact('doctorAvailabilities'));
    }


    public function storeTimeSlot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'required|date_format:H:i|after:startTime',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $doctorAvailability = DoctorAvailability::create([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
        ]);

        $timeSlot = Timeslots::create([
            'doctor_availability_id' => $doctorAvailability->id,
            'start_time' => $request->startTime,
            'end_time' => $request->endTime,
        ]);

        return redirect()->route('slotlist')->with('success', 'Time Slot created successfully');
    } 

    //     public function deleteDoctorAvailability($id)
    // {
    //     $doctorAvailability = DoctorAvailability::find($id);

    //     if (!$doctorAvailability) {
    //         return redirect()->route('slotlist')->with('error', 'Doctor availability not found.');
    //     }

    //     $doctorAvailability->timeslot()->delete();
    //     $doctorAvailability->delete();

    //     return redirect()->route('slotlist')->with('success', 'Doctor availability deleted successfully.');
    // }


    public function deleteDoctorAvailability($id)
    {
        try {
            $doctorAvailability = DoctorAvailability::findOrFail($id);
            $doctorAvailability->timeslot()->delete(); // Delete related timeslots
            $doctorAvailability->delete();
    
            return redirect()->route('slotlist')->with('success', 'Doctor availability deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('slotlist')->with('error', 'Error deleting doctor availability: ' . $e->getMessage());
        }
    }
    

    public function getDoctorAvailabilities()
    {
    $doctorAvailabilities = DoctorAvailability::with(['user', 'user.userdetails', 'timeslot'])
        ->where('user_id', Auth::user()->id)
        ->get();

    return DataTables::of($doctorAvailabilities)
        ->addColumn('specialist', function ($availability) {
            return $availability->user->userdetails->pluck('specialist')->implode(', ');
        })
        ->addColumn('actions', function ($availability) {
            return '<button class="btn btn-danger btn-sm">Delete</button>';
        })
        ->rawColumns(['actions'])
        ->make(true);
}

    
    
}

