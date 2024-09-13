<!-- resources/views/frontend/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-commerce Platform')</title>
    <!-- Include Coza-Store CSS files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header Section -->
    @include('frontend.HeaderAndFooter.header.blade.php')



    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer Section -->
    @include('frontend.HeaderAndFooter.footer.blade.php')

    <!-- Include Coza-Store JS files -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
