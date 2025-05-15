<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'PSU System')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        /* Reset & common */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #0A28D8;
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar img {
            width: 100px;
            margin-bottom: 30px;
        }

        .sidebar a {
            width: 100%;
            display: block;
            margin: 10px 0;
            padding: 12px 20px;
            background-color: white;
            color: #0A28D8;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #FFDA27;
            color: #0A28D8;
        }

        /* Main Content */
        .main {
            flex: 1;
            padding: 40px 20px;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            width: 100%;
            overflow-y: auto;
        }

        /* Container inside main */
        .container {
            width: 100%;
            max-width: 1400px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Logo container inside the container */
        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo-container img {
            width: 150px;
            margin-bottom: 15px;
        }

        .logo-container h2 {
            color: #0A28D8;
            font-size: 22px;
            text-align: center;
        }

        .logo-container p {
            color: #999;
            font-size: 14px;
            text-align: center;
        }

        /* Back button style (if used) */
        .back-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #0A28D8;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #FFDA27;
            color: #0A28D8;
        }

        /* Table and form styles (from first layout) */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #0A28D8;
        }

        .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        form label {
            margin-right: 10px;
            font-weight: 500;
        }

        form select {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-right: 15px;
            font-size: 14px;
        }

        form button {
            padding: 10px 20px;
            background-color: #0A28D8;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #FFDA27;
            color: #0A28D8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table thead {
            background-color: #0A28D8;
            color: #fff;
        }

        table th,
        table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination-btn {
            display: inline-block;
            padding: 8px 14px;
            margin: 0 5px;
            background-color: #0A28D8;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .pagination-btn:hover:not(.disabled) {
            background-color: #FFDA27;
            color: #0A28D8;
        }

        .pagination-btn.disabled {
            background-color: #ccc;
            cursor: default;
        }

        .pagination-btn.active {
            background-color: #FFDA27;
            font-weight: bold;
            color: #0A28D8;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="/images/psulogo.png" alt="PSU Logo" />
        <a href="{{ route('employees.index') }}">List of Users</a>
        <a href="{{ route('attendance.report') }}">DTR</a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <div class="logo-container">
                <img src="/images/psulogo.png" alt="PSU Logo" />
                <h2>Pangasinan State University - Urdaneta City Campus</h2>
                <p>Region's Premier University of Choice</p>
            </div>

            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>

</html>