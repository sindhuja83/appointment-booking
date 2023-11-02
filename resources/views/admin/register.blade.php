<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin-Panel {{isset($title)?'|'.$title:''}}</title>
      
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
      </head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="mb-0">Patient Register</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}">
                            <div class="text-danger" id="user_name-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            <div class="text-danger" id="email-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="text-danger" id="password-error"></div>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ isset($user) && $user->gender === 'Male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ isset($user) && $user->gender === 'Female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="Others" {{ isset($user) && $user->gender === 'Others' ? 'checked' : '' }}>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                            <!-- Error message for Gender -->
                            <div class="text-danger" id="gender-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}">
                            <div class="text-danger" id="mobile_number-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="Admin">Admin</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Patient">Patient</option>
                            </select>
                            <div class="text-danger" id="role-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                            <div class="text-danger" id="address-error"></div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                            {{-- <a href="{{ route('login') }}" class="btn btn-warning">Back to Login</a> --}}
                            <a href="{{ route('getLogin') }}" class="btn btn-warning">Back to Login</a>
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
        $('form').submit(function (event) {
            // Reset previous error messages
            $('.text-danger').html('').hide();
            $('.form-control').removeClass('is-invalid');

            // Initialize a variable to track whether the form is valid
            let formIsValid = true;

            let user_name = $('#user_name').val();
            if (user_name.trim() === '') {
                formIsValid = false;
                $('#user_name').addClass('is-invalid');
                $('#user_name-error').html('User Name is required.').show();
            }

            let email = $('#email').val();
            if (!isValidEmail(email)) {
                formIsValid = false;
                $('#email').addClass('is-invalid');
                $('#email-error').html('Enter a valid email address.').show();
            }

            let password = $('#password').val();
            if (password.length < 6) {
                formIsValid = false;
                $('#password').addClass('is-invalid');
                $('#password-error').html('Password must be at least 6 characters.').show();
            }

            let role = $('#role').val();

            if (role === 'Doctor') {
                let specialist = $('#specialist').val();
                if (specialist === 'null') { // Replace 'null' with the appropriate default value
                    formIsValid = false;
                    $('#specialist').addClass('is-invalid');
                    $('#specialist-error').html('Specialist is required.').show();
                }
            }

            if (role === 'Patient') {
                let address = $('#address').val();
                if (address.trim() === '' || address.length < 10) {
                    formIsValid = false;
                    $('#address').addClass('is-invalid');
                    $('#address-error').html('Address is required and must be at least 10 characters.').show();
                }
            }

            let mobile_number = $('#mobile_number').val();
            if (!isValidMobile(mobile_number)) {
                formIsValid = false;
                $('#mobile_number').addClass('is-invalid');
                $('#mobile_number-error').html('Enter a valid mobile number (up to 10 digits).').show();
            }

            let gender = $("input[name='gender']:checked").val();
            if (!gender) {
                formIsValid = false;
                $('#gender-error').html('Gender is required.').show();
            }

            if (role === 'null') { // Replace 'null' with the appropriate default value
                formIsValid = false;
                $('#role').addClass('is-invalid');
                $('#role-error').html('Role is required.').show();
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




 </body>
