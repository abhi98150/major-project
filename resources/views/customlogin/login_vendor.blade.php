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

<style>
    .alert {
        position: relative;
        padding: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
        font-size: 18px;
        margin-bottom: 15px;
        width: 100%;
        box-sizing: border-box;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        border: none;
        background: none;
        font-size: 1.5em;
        color: inherit;
        cursor: pointer;
    }
</style>



    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>

<div class="main">
    <!-- Sign in Form -->

    <section class="sign-in">
        
        <div class="container">
        <div class="alert">
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button class="close-btn" onclick="closeAlert(this)">&times;</button>
        </div>
    @endif


      
 
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('customlogin/images/signin-image.jpg') }}" alt="signin image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Vendor Login</h2>
                    <form action='{{ route("login.check_vendor") }}' method='POST'>
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

                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>

                        <h3><a href="{{ route('user.register') }}" class="signup-image-link">Create an account</a></h3>
                        <h3><a href="{{ route('login') }}" class="signup-image-link">Login as User</a></h3>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('customlogin/js/main.js') }}"></script>

<script>
    // JavaScript function to close the success message
    function closeAlert(button) {
        button.parentElement.style.display = 'none';
    }
</script>

</body>
</html>
