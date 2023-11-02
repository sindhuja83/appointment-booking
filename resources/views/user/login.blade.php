@extends('layouts.logapp')
 <head>
    <link rel="stylesheet" href="{{ asset('css/tooplate-style.css') }}">
    <style>
        /* Additional CSS styles for the improved design */
        .login-container {
            background: #f7f7f7;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            font-size: 28px;
            color: #333;
        }

        .login-header p {
            font-size: 16px;
            color: #777;
        }

        .login-logo a {
            font-size: 24px;
            font-weight: bold;
            color: #007BFF;
        }

        .login-box {
            margin: 0 auto;
            max-width: 400px;
        }

        .login-card-body {
            padding: 20px;
        }

        .input-group-text {
            background-color: #f7f7f7;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .footer {
            background: #f7f7f7;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
            border-top: 1px solid #ddd;
        }

        .footer a {
            color: #007BFF;
        }
    </style>
 </head>
@section('content')

<body>
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
                  </div>
             </div>
        </div>
   </header><br><br>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 offset-md-3 login-box">
                <div class="login-logo">
                    <a href="#"><span class="fas fa-lock"></span> Login</a>
                </div>
                <div class="card">
                    <div class="card-body login-card-body">
                        @if (session('error'))
                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('userLogin') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email">
                            </div>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input name="checkbox" type="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                            <div class="form-group text-center">
                                <a href="{{ route('homepage') }}" style="color: #007BFF;">Want to create a profile? Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2023 Your Company | Design: <a href="http://www.tooplate.com" target="_blank">Tooplate</a></p>
    </div>
</body>

@endsection
