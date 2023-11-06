@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="mb-0">User List
                    @role('Admin') <a href="{{ route('create') }}" class="btn btn-warning" style="margin-left:960px">Create New</a></h2> @endrole
                    {{-- @role('Doctor') <a href="#" class="btn btn-warning " style="margin-left:960px">Create New</a></h2> @endrole --}}

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="user-list" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
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
    $(document).ready(function() {
        $('#user-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('datatables.users') }}",
            columns: [
                { data: 'user_name', name: 'user_name' },
                { data: 'email', name: 'email' },
                { data: 'mobile_number', name: 'mobile_number' },
                { data: 'gender', name: 'gender' },
                { 
                    data: 'actions', 
                    name: 'actions', 
                    orderable: false, 
                    searchable: false,
                    @role('Doctor')
                        visible: false, 
                    @endrole
                },            
            ], 
        });
    });
</script>
@endsection
