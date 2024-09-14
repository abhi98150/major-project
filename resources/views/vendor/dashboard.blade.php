<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            border-right: 1px solid #dee2e6;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #dee2e6;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            margin-left: 250px;
        }

        .header .btn-logout {
            color: white;
            border: none;
            background: none;
            font-size: 16px;
        }

        .header .btn-logout:hover {
            color: #ffdddd;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Vendor Dashboard</h4>
        <a href="#" class="active">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Orders</a>
        <a href="#">Products</a>
        <a href="#">Settings</a>
        <a href="{{ route('vendor.logout') }}" class="btn-logout">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header d-flex justify-content-between align-items-center">
            <h2>Welcome, {{ Auth::guard('vendor')->user()->name }}</h2>

            <form action="{{ route('vendor.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
            
        </div>

        <!-- Dashboard Content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Recent Orders</h5>
                        </div>
                        <div class="card-body">
                            <p>No recent orders.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Product Statistics</h5>
                        </div>
                        <div class="card-body">
                            <p>No product statistics available.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
