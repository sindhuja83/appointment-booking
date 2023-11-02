@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Appointment Listing</h3>
        </div>
        <div class="card-body">
            <table class="table" id="appointments">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Specialist</th>
                        <th>Time Slot</th>
                        <th>Date of Appointment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>


                <script>
                    $(document).ready(function() {
                        $('#appointments').DataTable({
                            paging: true, 
                            pageLength: 10, 
                        });
                    });
                </script>
                <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->users->user_name }}</td>
                        <td>{{ $appointment->user->user_name }}</td>
                        @php
                            $doctor = App\Models\Userdetails::where('user_id', $appointment->user_id_to)->first();
                            $specialist = $doctor->specialist;
                        @endphp
                        <td>
                            {{ $specialist }}
                        </td>
                        <td>{{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if($appointments->hasPages())
                {{ $appointments->links() }} 
            @endif
        </div>
        
    </div>
</div>
@endsection
