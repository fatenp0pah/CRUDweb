<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Modern font for a clean look */
            background: linear-gradient(135deg, rgba(226, 214, 199, 0.8), rgba(226, 214, 199, 0.8)), /* Gradient background */
                        url('https://laundry8plm.b-cdn.net/wp-content/uploads/2023/02/apa-itu-laundry.jpg'); /* Replace with your background image URL */
            background-size: cover; /* Ensure the background image covers the entire page */
            background-position: center; /* Center the image */
            margin: 0;
            color: #3b3029; /* Dark text for readability */
        }
        .navbar {
            background-color: #8B4513; /* Dark brown */
            color: white;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .container {
            padding: 20px;
            text-align: center;
            max-width: 800px; /* Limit width for a better layout */
            margin: 0 auto; /* Center the container */
            background-color: rgba(255, 255, 255, 0.9); /* White background for the content area with slight transparency */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the container */
        }
        a {
            display: block;
            margin: 10px 0; /* Space between links */
            color: #8B4513; /* Link color */
            text-decoration: none; /* Remove underline */
            padding: 10px;
            border-radius: 4px; /* Rounded corners for links */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }
        a:hover {
            background-color: #d1c4b2; /* Lighter background on hover */
        }
        .clock {
            font-size: 1.5em; /* Larger font for the clock */
            font-weight: bold; /* Make it bold for emphasis */
            margin: 20px 0; /* Space around the clock */
        }
    </style>
    <script>
        function updateClock() {
            const now = new Date();
            const options = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            document.getElementById('current-time').innerText = now.toLocaleTimeString('en-US', options);
        }

        setInterval(updateClock, 1000); // Update the clock every second
    </script>
</head>
<body onload="updateClock()">
    <div class="navbar">
        <h1>Admin Dashboard</h1>
    </div>
    <div class="container">
        <h2>Welcome to the Admin Dashboard</h2>
        <div class="clock" id="current-time">Loading...</div> <!-- Current time displayed here -->
        <p>This is your dashboard where you can manage your laundry business efficiently.</p>
        
        <div>
            <a href="{{ route('customers.index') }}">Manage Customers</a>
            <a href="{{ route('services.index') }}">Manage Services</a>
            <a href="{{ route('orders.index') }}">Manage Orders</a>
        </div>
    </div>
</body>
</html>
