@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
          <h3>  Doctor Availability Schedule
            <a href="{{ route('timeslot') }}" class="btn btn-success" style="margin-left:580px">Add New Slot</a>
          </h3>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="doctorAvailabilities">
                <thead>
                    <tr>
                        <th>Doctor's Name</th>
                        <th>Specialist</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            
            <script>
                $(document).ready(function () {
                    $('#doctorAvailabilities').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('datatables.doctor-availabilities') }}",
                        columns: [
                            { data: 'user.user_name', name: 'user.user_name' },
                            { data: 'specialist', name: 'specialist', orderable: false, searchable: false },
                            { data: 'date', name: 'date' },
                            { data: 'timeslot.start_time', name: 'timeslot.start_time' },
                            { data: 'timeslot.end_time', name: 'timeslot.end_time' },
                            { data: 'actions', name: 'actions', orderable: false, searchable: false },
                        ],
                    });
                });
            </script>
            </div>
        </div>
    </div>
@endsection
