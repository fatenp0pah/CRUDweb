<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1>User Profile</h1>
    </header>
    <main>
        <h2>Welcome, {{ auth()->user()->name }}</h2>
        <p>Email: {{ auth()->user()->email }}</p>
    </main>
</body>
</html>
