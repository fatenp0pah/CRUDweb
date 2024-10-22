<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f5f5dc; /* Light brown background */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #8B4513; /* Saddle brown */
        }

        .container {
            text-align: center;
            background-color: #fff; /* White background for the container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        a {
            color: #8B4513; /* Saddle brown */
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Dashboard!</h1>
        <p>This is your customer dashboard.</p>
        <a href="{{ route('customer.logout') }}">Logout</a> <!-- Update this route as necessary -->
    </div>
</body>
</html>
