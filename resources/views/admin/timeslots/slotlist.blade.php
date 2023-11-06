@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3>Doctor Availability Schedule
                        <a href="{{ route('timeslot') }}" class="btn btn-warning" style="margin-left:750px">Add New Slot</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="doctorAvailabilities" style="width: 100%;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                { data: 'specialist', name: 'specialist' },
                { data: 'date', name: 'date' },
                { data: 'timeslot.start_time', name: 'timeslot.start_time' },
                { data: 'timeslot.end_time', name: 'timeslot.end_time' },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return '<button class="btn btn-danger btn-sm delete-doctor-availability" data-id="' + full.id + '">Delete</button>';
                    }
                },
            ],
        });

        $(document).on('click', '.delete-doctor-availability', function () {
            var doctorAvailabilityId = $(this).data('id');

            if (confirm('Are you sure you want to delete this doctor availability?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/delete-doctor-availability/' + doctorAvailabilityId,
                    success: function (data) {
                        $('#doctorAvailabilities').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        console.error('Error deleting doctor availability', data);
                        alert('Error deleting doctor availability');
                    }
                });
            }
        });
    });
</script>
@endsection
