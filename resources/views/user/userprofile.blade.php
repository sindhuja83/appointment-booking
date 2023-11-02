@extends('layouts.apps')

@section('content')
     <!-- HEADER -->
     <header>
        <div class="container">
             <div class="row">

                  <div class="col-md-4 col-sm-5">
                       <p><b>Welcome to a Professional Health Care!</b></p>
                  </div>
                       
                  <div class="col-md-8 col-sm-7 text-align-right">
                       <span class="phone-icon"><i class="fa fa-phone"></i> 010-060-0160</span>
                       <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Mon-Fri)</span>
                       <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></span>
                       <span class="date-icon"><i class="fa fa-calendar-plus-o"></i><a href="{{ route('userLogin')}}" class="ml-2">User Login</a></span>
                       <a href="{{ route('userlogout')}}" class="ml-2">Logout</a>
                  </div>
             </div>
        </div>
   </header><br>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">User Profile
                <a href="{{ route('homepage')}}" class="btn btn-info" style="margin-left:730px;">Back to Home</a>
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Profile Image:</label><br>
                        {{-- <img src="{{ asset('storage/profiles/' . $user->image) }}" alt="Profile Image" class="img-thumbnail" width="100"> --}}
                        <img src="../dist/img/avatar5.png " alt="" class="img-circle elevation-3 ml-2" style="width: 60px; height: 60px;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">User Name:</label>
                        <p>{{ $user->user_name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <!-- Add more user details here -->
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Contact Number:</label>
                        <p>{{ $user->mobile_number}}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Gender:</label>
                        <p>{{ $user->gender }}</p>
                    </div>
                    <!-- Add more user details here -->
                </div>
            </div>
        </div>
        <!-- Display Appointments -->
        <div class="card-footer">
            <h3>Appointments</h3><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Specialist</th>
                        <th>Time</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
</div>


@endsection

 