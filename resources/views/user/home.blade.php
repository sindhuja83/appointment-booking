@extends('layouts.apps')
@section("content")
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome to a Professional Health Care</p>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> 010-060-0160</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Mon-Fri)</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></span>
                         <span class="appointment-btn"><i class="fa fa-phone"></i><a href="#appointment">Make an appointment</a></span>
                    </div>
               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top"  role="navigation">
          <div class="container d-inline">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>ealth Center</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right  d-inline">
                         <li><a href="#top" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About Us</a></li>
                         <li><a href="#team" class="smoothScroll">Doctors</a></li>
                         <li><a href="#news" class="smoothScroll">News</a></li>
                         <li><a href="#google-map" class="smoothScroll">Contact</a></li>
                         <li><a href="#register" class="smoothScroll">Register</a></li>
                         @auth
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle btn btn-warning" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fa fa-user"></i> {{ Auth::user()->user_name }}
                             </a>
                             <div class="dropdown-menu" aria-labelledby="userDropdown">
                                 <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>                           
                                 <a class="dropdown-item" href="{{ route('getAppointment') }}">My Appointments</a>
                                 <a class="dropdown-item" href="{{ route('userlogout') }}">Logout</a>
                             </div>
                         </li>
                         @else
                         <li class="appointment-btn"><a href="{{ route('userLogin') }}">Login</a></li>
                         @endauth
                         
                         @auth
                         <span class="email-icon" style=" margin-left:30px;">
                             <img src="{{ asset('../dist/img/avatar5.png ') }}" alt="User Image" class="img-circle elevation-3 ml-2" style="width: 60px; height: 60px;">
                             {{ Auth::user()->name }}
                         </span>
                         @endauth
                   
                         {{-- <img src="../dist/img/avatar5.png " alt="" class="img-circle elevation-3" style="width: 60px; height: 60px; margin-left:300px;"> --}}
                    </ul>
               </div>
          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container-fluid">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3 style="margin-top:200px">Let's make your life happier</h3>
                                             <h1>Healthy Living</h1>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Doctors</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3 style="margin-top:200px">Aenean luctus lobortis tellus</h3>
                                             <h1>New Lifestyle</h1>
                                             <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3 style="margin-top:200px">Pellentesque nec libero nisi</h3>
                                             <h1>Your Health Benefits</h1>
                                             <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read Stories</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Your <i class="fa fa-h-square"></i>ealth Center</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi vitae velit volutpat venenatis.</p>
                                   <p>Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut placerat, diam a tempus vehicula.</p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="../images/author-image.jpg" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3>Dr. Neil Jackson</h3>
                                        <p>General Principal</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
</section>

     <head>
        <style>
            /* Custom CSS for the form design */
            .section-title {
                text-align: center;
                margin-bottom: 20px;
            }
        
            .form-group {
                margin-bottom: 20px;
            }
        
            .form-group label {
                font-weight: bold;
            }
        
            .form-control {
                padding: 10px;
                height: 60px; /* Adjust the input box height as needed */
            }
        
            .btn-primary {
                background-color: #007BFF;
                border: none;
                height: 40px; /* Increase the button height to 100% */
                width:22%
            }
        
            .btn-primary:hover {
                background-color: #0056b3;
            }
        </style>
   </head>

<section id="register">
        <div class="container">
             <div class="row">
                  <div class="col-md-6 col-sm-6">
                       <div class="about-info">
                            <h2 class="wow fadeInUp" data-wow-delay="0.6s">Patient Registeration </i></h2>
                            

<div class="container mt-5">
          <div class="row justify-content-center">
               <div class="col-md-8">
               <div class="card">
                    <!-- SECTION TITLE -->                            
                    <div class="card-body wow fadeInUp mt-5" data-wow-delay="0.8s">
                         <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                              @csrf

                              @if(session('success'))
                              <div class="alert alert-success">
                                  {{ session('success') }}
                              </div>
                              @endif
                          
                              @if($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
     
                              <div class="form-group">
                                   <label for="user_name">Patient Name</label>
                                   <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" placeholder="Full Name">
                                   <div class="text-danger" id="user_name-error"></div>
                              </div>
     
                              <div class="form-group">
                                   <label for="email">Email</label>
                                   <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email">
                                   <div class="text-danger" id="email-error"></div>
                              </div>
     
                              <div class="form-group">
                                   <label for="password">Password</label>
                                   <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                   <div class="text-danger" id="password-error"></div>
                              </div>

                              <div class="form-group">
                              <label for="gender">Gender</label>
                              <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                   <label class="form-check-label" for="male">Male</label>
                              </div>
                              <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                   <label class="form-check-label" for="female">Female</label>
                              </div>
                              <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                                   <label class="form-check-label" for="other">Other</label>
                              </div>
                              <!-- Error message for Gender -->
                              <div class="text-danger" id="gender-error"></div>
                              </div>
                              
     
                              <div class="form-group">
                                   <label for="mobile_number">Mobile Number</label>
                                   <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                                   <div class="text-danger" id="mobile_number-error"></div>
                              </div>
     
                              <div class="form-group">
                                   <label for="role">Role</label>
                                   <select class="form-control" id="role" name="role">
                                   <option value="Admin">Select</option>
                                   <option value="Patient">Patient</option>
                                   </select>
                                   <div class="text-danger" id="role-error"></div>
                              </div>
     
                              <div class="form-group">
                                   <label for="address">Address</label>
                                   <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address">{{ old('address') }}</textarea>
                                   <div class="text-danger" id="address-error"></div>
                              </div>
     
                              <button type="submit" class="btn btn-primary">Register</button>
                              <a href="{{ route('userLogin')}}" class="btn btn-warning" style="margin-left:390px; padding:10px;">Back to User Login</a>
                         </form>
                    </div>
               </div>
               </div>
          </div>
     </div>                           
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
                                $(document).ready(function () {
                                    $('#appointment-form').submit(function (event) {
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
                  </div>            
             </div>
        </div>
</section>


   {{-- DOCTORS'S PROFILE --}}
          <section id="team" data-stellar-background-ratio="1">
               <div class="container">
                    <div class="row">

                         <div class="col-md-12 col-sm-6">
                              <div class="about-info">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Doctors</h2>
                              </div>
                         </div>

                         <div class="clearfix"></div>

                         @foreach ($user as $users)
                         @if ($users->hasRole('Doctor'))
                         
                         <div class="col-md-4 col-sm-6">
                              <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                                   <img src="../images/team-image1.jpg" class="img-responsive" alt="">

                                        <div class="team-info block">
                                             <h3>{{ $users->user_name }}</h3>
                                             @foreach ($users->userdetails as $userdetail)
                                             <p>{{ $userdetail->specialist }}</p>
                                             @endforeach
                                             <div class="team-contact-info">
                                                  <p><i class="fa fa-phone"></i> {{ $users->mobile_number }}</p>
                                                  <a href="#appointment-form" class="btn btn-warning btn-sm book-appointment" data-doctor-name="{{ $users->user_name }}"  data-doctor-id="{{ $users->id }}">Book Appointment</a>

                                             </div>
                                             <ul class="social-icon">
                                                  <li><a href="#" class="fa fa-linkedin-square"></a></li>
                                                  <li><a href="#" class="fa fa-envelope-o"></a></li>
                                             </ul>
                                        </div>
                                  </div>
                           </div> 
                         @endif
                         @endforeach              
                    </div>
               </div>
          </section>


<!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Latest News</h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="news-detail.html">
                                   <img src="../images/news-image1.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>March 08, 2018</span>
                                   <h3><a href="news-detail.html">About Amazing Technology</a></h3>
                                   <p>Maecenas risus neque, placerat volutpat tempor ut, vehicula et felis.</p>
                                   <div class="author">
                                        <img src="../images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Jeremie Carlson</h5>
                                             <p>CEO / Founder</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="news-detail.html">
                                   <img src="../images/news-image2.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>February 20, 2018</span>
                                   <h3><a href="news-detail.html">Introducing a new healing process</a></h3>
                                   <p>Fusce vel sem finibus, rhoncus massa non, aliquam velit. Nam et est ligula.</p>
                                   <div class="author">
                                        <img src="../images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Jason Stewart</h5>
                                             <p>General Director</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="news-detail.html">
                                   <img src="../images/news-image3.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>January 27, 2018</span>
                                   <h3><a href="news-detail.html">Review Annual Medical Research</a></h3>
                                   <p>Vivamus non nulla semper diam cursus maximus. Pellentesque dignissim.</p>
                                   <div class="author">
                                        <img src="../images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Andrio Abero</h5>
                                             <p>Online Advertising</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
</section>



<!--  APPOINTMENT BOOKING FORM -->
<section id="appointment-form" data-stellar-background-ratio="3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <img src="../images/appointment-image.jpg" class="img-responsive" alt="">
            </div>

            <div class="col-md-6 col-sm-6">
                <form role="form" method="post" action="{{ route('appointments.store') }}">
                 @csrf
                    <div class="section-title wow fadeInUp" data-wow-delay="0.4s" style="margin-right: 50px;">
                        <h2>Make an appointment</h2>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                                                  
                    <input type="hidden" name="user_id_from" value="{{ Auth::id() }}"> 
                    <input type="hidden" id="doctorId" name="user_id_to" value="">
                    <input type="hidden" id="timeSlotId" name="time_slot_id" value="">


                    <div class="wow fadeInUp" data-wow-delay="0.8s">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="doctorName">Doctor's Name</label>
                                <input type="text" class="form-control" id="doctorName" name="doctorName" placeholder="Doctor's Name" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="patientName">Patient Name</label>
                                @if (Auth::check())
                                <input type="text" class="form-control" id="patientName" name="patientName" placeholder="Patient Name" value="{{ Auth::user()->user_name }}" disabled>
                            @else
                                <input type="text" class="form-control" id="patientName" name="patientName" placeholder="Patient Name" readonly>
                                <div class="alert alert-danger">
                                    Register or log in to access appointment booking.
                                </div>
                            @endif
                                <span id="patientNameError" class="error-message"></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">Date of Appointment</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Date of Appointment">
                                <span id="dateError" class="error-message"></span>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="timeSlot">Time Slot</label>
                              <select class="form-control" id="timeSlot" name="timeSlot">
                                  <option value="">Select a Time Slot</option>
                              </select>
                              <span id="timeSlotError" class="error-message"></span>
                          </div>

                            <div class="form-group col-md-12">
                                <label for="status">Appointment Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option>Select</option>
                                    <option>Booked</option>
                                    <option>Unbooked</option>
                                </select>
                                <span id="statusError" class="error-message"></span>
                            </div>
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-lg-primary" id="cf-submit" name="submit">Book Appointment</button>
                                {{-- <a href="{{ route('userLogin')}}" class="btn btn-warning" style="margin-left:200px;">User Login</a> --}}
                              </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> 

<script>
$(document).ready(function () {
    $('.book-appointment').on('click', function (event) {
        event.preventDefault();

        var doctorName = $(this).data('doctor-name');
        var doctorId = $(this).data('doctor-id');

        $('#doctorName').val(doctorName);
        $('#doctorId').val(doctorId);

        fetchDoctorTimeSlots(doctorId);
    });

    $('#date').on('change', function () {
        var selectedDate = $(this).val();

        var doctorId = $('#doctorId').val();
        fetchDoctorTimeSlots(doctorId, selectedDate);
    });

    $('#timeSlot').on('change', function () {
        var selectedTimeSlot = $(this).val();
        var timeSlotId = $(this).find('option:selected').data('time-slot-id');

        $('#timeSlotId').val(timeSlotId);
    });

    $('#date').on('input', function () {
        var currentDate = new Date();
        var selectedDate = new Date($(this).val());

        if (selectedDate < currentDate) {
            alert('Please select a future or current date.');
            $(this).val('');
        }
    });
});

function fetchDoctorTimeSlots(doctorId, selectedDate) {
    var url = `/doctors/${doctorId}/timeslots?date=${selectedDate}`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const timeSlotDropdown = document.getElementById("timeSlot");

            timeSlotDropdown.innerHTML = '<option value="">Select a Time Slot</option>';

            data.forEach(timeSlot => {
                const startTime = timeSlot.start_time;
                const endTime = timeSlot.end_time;
                const timeSlotId = timeSlot.id;
                const option = document.createElement("option");
                option.value = `${startTime} - ${endTime}`;
                option.textContent = `${startTime} - ${endTime}`;
                option.setAttribute('data-time-slot-id', timeSlotId);
                timeSlotDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching doctor time slots:', error);
        });
}
</script>
 

     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="../images/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Amazing Technology</h5></a>
                                        <span>March 08, 2018</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="../images/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>New Healing Process</h5></a>
                                        <span>February 20, 2018</span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                                   <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com/tooplate" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2017 Your Company 
                                   
                                   | Design: <a href="http://www.tooplate.com" target="_parent">Tooplate</a></p>
                              </div>
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
@endsection