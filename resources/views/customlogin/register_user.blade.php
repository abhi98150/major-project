<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('customlogin/css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('customlogin/fonts/material-icon/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <style>
        /* Additional CSS to style the role section */
        .role {
            margin-left: 20px; /* Adjust the value as needed */
        }

        .form-check {
            margin-bottom: 10px; /* Adjust spacing between radio buttons */
        }

        .form-check-input {
            margin-right: 5px; /* Space between radio button and label */
        }

        .form-check-label {
            margin-left: 5px; /* Space between radio button and label */
        }

        #seller-fields {
            margin-left: 20px; /* Align additional fields properly */
            display: none; /* Hidden by default, shown when "seller" is selected */
        }
    </style>
</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register as User</h2>
                        
                        <!-- Error and success messages inside the form -->
                        <div class="alert-container">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif 

                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>

                        <form method="POST" class="register-form" id="register-form" action="{{ route('register_user.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Username" value="{{ old('username') }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required/>
                            </div>

                            <!-- Form Button -->
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>

                    </div>

                    <div class="signup-image">
                        <figure><img src="{{ asset('customlogin/images/signup-image.jpg') }}" alt="signup image"></figure>
                        
                        <a href="{{ route('login') }}" class="signup-image-link">I am already a member</a>

                        <h3><a href="{{ route('vendor.register') }}" class="signup-image-link">Register as vendor</a></h3>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>
</html>
