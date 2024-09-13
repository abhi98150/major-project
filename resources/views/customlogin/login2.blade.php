<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('customlogin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('customlogin/fonts/material-icon/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('customlogin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="main">
        <!-- Sign in Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        
                        <figure><img src="{{ asset('customlogin/images/signin-image.jpg') }}" alt="signin image"></figure>

                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form action='{{ route("login.check") }}' method='POST'>
                            @csrf
                            <div class="form-group">
                                <label for="email" class="form-icon"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" class="form-control" id="email" name='email' placeholder="Email address">
                                @error('email')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-icon"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class="form-control" id="password" name='password' placeholder="Password">
                                @error('password')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                             -->
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>

                        <h3> <a href="{{ route('register') }}" class="signup-image-link">Create an account</a> </h3>

                        </form>
                        <!-- <div class="social-login">

                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#" class="social-icon zmdi zmdi-facebook"></a></li>
                                <li><a href="#" class="social-icon zmdi zmdi-twitter"></a></li>
                                <li><a href="#" class="social-icon zmdi zmdi-google"></a></li>
                            </ul>

                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('customlogin/js/main.js') }}"></script>
</body>
</html>
