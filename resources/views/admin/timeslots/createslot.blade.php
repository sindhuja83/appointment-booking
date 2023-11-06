@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           <h3>Doctor's Availability Time Slot</h3>
        </div>
        <div class="card-body">
            <form id="appointmentForm" method="POST" action="{{ route('storeTimeSlot') }}">
                @csrf
                <div class="form-group">
                    <label for="doctorName">Doctor's Name:</label>
                    <input type="text" class="form-control" id="doctorName" name="doctorName" value="{{ Auth::user()->user_name }}" disabled>
                </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                </div>

                <div class="form-group">
                    <label for="startTime">Start Time:</label>
                    <input type="time" class="form-control" id="startTime" name="startTime" value="{{ old('startTime') }}">
                </div>

                <div class="form-group">
                    <label for="endTime">End Time:</label>
                    <input type="time" class="form-control" id="endTime" name="endTime" value="{{ old('endTime') }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('slotlist') }}" class="btn btn-warning" style="margin-left: 900px">Back</a>
            </form>
        </div>
    </div>
</div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
 <script>
    $(document).ready(function () {
        $('#appointmentForm').validate({
            rules: {
                date: {
                    required: true
                },
                startTime: {
                    required: true
                },
                endTime: {
                    required: true,
                    greaterThan: "#startTime"
                },
                doctorName: {
                    required: true
                }
            },
            messages: {
                date: "Please enter a valid date.",
                startTime: "Please enter a valid start time.",
                endTime: {
                    required: "Please enter an end time.",
                    greaterThan: "End time must be greater than the start time."
                },
                doctorName: "Please enter the doctor's name."
            }
        });

        $.validator.addMethod("greaterThan", function (value, element, params) {
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }
            return isNaN(value) && isNaN($(params).val()) || (parseFloat(value) > parseFloat($(params).val()));
        }, 'Must be greater than {0}.');

        $('#endTime').rules('add', {
            greaterThan: "#startTime"
        });
    });
 </script>
@endsection

