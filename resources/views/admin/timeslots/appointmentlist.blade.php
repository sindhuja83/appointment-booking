@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h3>Appointment Listing</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="appointments"  style="width: 100%;">
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
        $('#appointments').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('appointments.list') }}",
            columns: [
                { data: 'patient_name', name: 'patient_name' },
                { data: 'doctor_name', name: 'doctor_name' },
                { data: 'specialist', name: 'specialist' },
                { data: 'time_slot', name: 'time_slot' },
                { data: 'date', name: 'date' },
                { data: 'status', name: 'status' },
            ],
        });
    });
</script>
@endsection

