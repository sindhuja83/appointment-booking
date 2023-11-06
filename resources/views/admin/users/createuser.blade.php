@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="mb-0">{{ isset($user) ? 'Edit User' : 'Add new Healthcare provider' }}</h2>
                </div>

                <div class="card-body">
                    <form action="{{ isset($user) ? route('updateuser', $user->id) : route('storeuser') }}" method="post" enctype="multipart/form-data" id="userForm">
                        @csrf
                        @if(isset($user))
                        @method('PUT')
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="user_name" value="{{ isset($user) ? $user->user_name : '' }}">
                                <!-- Error message for Name -->
                                <div class="text-danger" id="name-error"></div>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}">
                                <div class="text-danger" id="email-error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" value="{{ isset($user) ? $user->password : '' }}" name="password">
                                <!-- Error message for Password -->
                                <div class="text-danger" id="password-error"></div>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile_number" value="{{ isset($user) ? $user->mobile_number : '' }}">
                                <!-- Error message for Mobile -->
                                <div class="text-danger" id="mobile-error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-6 mt-2">
                            <label>Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ isset($user) && $user->gender == 'male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ isset($user) && $user->gender == 'female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="Other" {{ isset($user) && $user->gender == 'other' ? 'checked' : '' }}>
                                <label class="form-check-label" for="other">Other</label>
                            </div>                            
                            <!-- Error message for Gender -->
                            <div class="text-danger" id="gender-error"></div>
                        </div>

                        <div class="col-md-6">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="Select" {{ $userRole === 'Select' ? 'selected' : '' }}>Select</option>
                                <option value="Doctor" {{ $userRole === 'Doctor' ? 'selected' : '' }}>Doctor</option>
                                <option value="Patient" {{ $userRole === 'Patient' ? 'selected' : '' }}>Patient</option>
                            </select>
                            <!-- Error message for Role -->
                            <div class="text-danger" id="role-error"></div>
                        </div></div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            {{-- <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $userDetails->address) }}</textarea> --}}
                            <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $userDetails ? $userDetails->address : '') }}</textarea>
                            <!-- Error message for Address -->
                            <div class="text-danger" id="address-error"></div>
                        </div><br>

                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h2 class="mb-0"> Additional Info- (Healthcare Provider) </h2>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="specialist">Specialist</label>
                                <select class="form-control" id="specialist" name="specialist">
                                    <option value="Select">Select</option>
                                    @foreach($specialists as $specialist)
                                        <option value="{{ $specialist->id }}" {{ isset($userDetails) && $userDetails->specialist == $specialist->id ? 'selected' : '' }}>
                                            {{ $specialist->specialist }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- Error message for Specialist -->
                                <div class="text-danger" id="specialist-error"></div>
                            </div>

                        <div class="col-md-6">
                            <label for="experience">Experience</label>
                            <select class="form-control" id="experience" name="experience">
                                <option value="Select">Select</option>
                                @foreach($experiences as $experience)
                                    <option value="{{ $experience }}" {{ isset($userDetails) && $userDetails->experience == $experience ? 'selected' : '' }}>
                                        {{ $experience }} years
                                    </option>
                                @endforeach
                            </select>
                            <!-- Error message for Experience -->
                            <div class="text-danger" id="experience-error"></div>
                          </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="clinic_name">Clinic Name</label>
                                <input type="text" class="form-control" id="clinic_name" name="clinic_name" value="{{ isset($user) && $userDetails ? $userDetails->clinic_name : '' }}">
                                <div class="text-danger" id="clinic-name-error"></div>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="consultation_fee">Consultation Fee</label>
                                <input type="text" class="form-control" id="consultation_fee" name="consultation_fee" value="{{ isset($user) && $userDetails ? $userDetails->consultation_fee : '' }}">
                                <div class="text-danger" id="consultation-fee-error"></div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($user) ? 'Update' : 'Submit' }}
                            </button>
                            <a href="{{ route('userlist')}}" class="btn btn-warning">Back to User List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script>
    $(document).ready(function () {
        $('#userForm').submit(function (event) {
            // Reset previous error messages and styles
            $('.text-danger').html('');
            $('.form-control').removeClass('is-invalid');
            let formIsValid = true;
    
            let name = $('#name').val();
            if (name.trim() === '') {
                formIsValid = false;
                $('#name').addClass('is-invalid');
                $('#name-error').html('Name is required.');
            }
    
            let email = $('#email').val();
            if (!isValidEmail(email)) {
                formIsValid = false;
                $('#email').addClass('is-invalid');
                $('#email-error').html('Enter a valid email address.');
            }
    
            let mobile = $('#mobile').val();
            if (!isValidMobile(mobile)) {
                formIsValid = false;
                $('#mobile').addClass('is-invalid');
                $('#mobile-error').html('Enter a valid mobile number (up to 10 digits).');
            }
    
            let password = $('#password').val();
            if ($('#password').is(':visible') && password.length < 6) {
                formIsValid = false;
                $('#password').addClass('is-invalid');
                $('#password-error').html('Password must be at least 6 characters.');
            }
    
            let role = $('#role').val();
            if (role.trim() === '') {
                formIsValid = false;
                $('#role').addClass('is-invalid');
                $('#role-error').html('Role is required.');
            }
    
            let gender = $("input[name='gender']:checked").val();
            if (!gender) {
                formIsValid = false;
                $('.form-check-input').addClass('is-invalid');
                $('#gender-error').html('Gender is required.');
            }
    
            let address = $('#address').val();
            if (address.trim() === '' || address.length < 10) {
                formIsValid = false;
                $('#address').addClass('is-invalid');
                $('#address-error').html('Address is required and must be at least 10 characters.');
            }
    
            if (role === 'Doctor') {
                let specialist = $('#specialist').val();
                if (specialist === 'Select') {
                    formIsValid = false;
                    $('#specialist').addClass('is-invalid');
                    $('#specialist-error').html('Specialist is required.');
                }
    
                let experience = $('#experience').val();
                if (!experience) {
                    formIsValid = false;
                    $('#experience').addClass('is-invalid');
                    $('#experience-error').html('Experience is required.');
                }
    
                let clinicName = $('#clinic_name').val();
                if (clinicName.trim() === '') {
                    formIsValid = false;
                    $('#clinic_name').addClass('is-invalid');
                    $('#clinic-name-error').html('Clinic Name is required.');
                }
    
                let consultationFee = $('#consultation_fee').val();
                if (consultationFee.trim() === '') {
                    formIsValid = false;
                    $('#consultation_fee').addClass('is-invalid');
                    $('#consultation-fee-error').html('Consultation Fee is required.');
                }
            }
    
            if (!formIsValid) {
                event.preventDefault();
            }
        });
    
        function isValidEmail(email) {
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailPattern.test(email);
        }
    
        function isValidMobile(mobile) {
            const mobilePattern = /^\d{1,10}$/;
            return mobilePattern.test(mobile);
        }
    });
 </script>
@endsection



