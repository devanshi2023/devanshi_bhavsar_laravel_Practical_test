<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Optional basic styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 30px;
            max-width: 700px;
            margin: 0 auto;
        }

        .card {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 30px;
        }

        .card-body {
            padding: 30px;
            text-align: center;
        }

        .btn-logout {
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                <h2>Welcome, {{ Auth::user()->first_name }}</h2>
                <p class="mb-0">You're logged in as an <strong>Admin</strong></p>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
