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
                        <h2 class="form-title">Sign up</h2>
                        
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
                                    {{ session('success')}}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error')}}
                                </div>
                            @endif
                        </div>

                        <form method="POST" class="register-form" id="register-form" action="{{ route('register.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Username" value="{{ old('name') }}" required/>
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
                            <div class="registeraslabel">
                                <h4>Register As</h4>
                            </div>

                            

                           <!-- User or Seller Selection -->
                            <!-- User or Seller Selection -->
                                <div class="form-group role">
                                    <div class="custom-radio-group">
                                        <input class="form-check-input" type="radio" id="role_user" name="role" value="user" onchange="toggleAdditionalFields()">
                                        <label class="form-check-label" for="role_user">
                                            <div class="user">User</div>
                                        </label>
                                    </div>

                                    <div class="custom-radio-group">
                                        <input class="form-check-input" type="radio" id="role_seller" name="role" value="seller" onchange="toggleAdditionalFields()">
                                        <label class="form-check-label" for="role_seller">
                                            <div class="seller">Seller</div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Additional Fields for Seller -->
                                <div id="seller-fields" style="display: none;">
                                    <div class="form-group">
                                        <label for="company_name"><i class="zmdi zmdi-file-text"></i> </label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="pan_no"><i class="zmdi zmdi-accounts"></i> </label>
                                        <input type="text" id="pan_no" name="pan_no" class="form-control" placeholder="PAN Number"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile_number"><i class="zmdi zmdi-phone"></i> </label>
                                        <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder="Mobile Number"/>
                                    </div>
                                </div>


                            <!-- form button -->

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>

                    </div>

                    <div class="signup-image">
                        <figure><img src="{{ asset('customlogin/images/signup-image.jpg') }}" alt="signup image"></figure>
                        
                        <a href="{{ route('login') }}" class="signup-image-link">I am already a member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('customlogin/js/main.js') }}"></script>
    <script>
            function toggleAdditionalFields() {
                var role = document.querySelector('input[name="role"]:checked');
                var sellerFields = document.getElementById('seller-fields');
                if (role && role.value === 'seller') {
                    sellerFields.style.display = 'block';
                } else {
                    sellerFields.style.display = 'none';
                }
            }

    </script>

</body>
</html>
