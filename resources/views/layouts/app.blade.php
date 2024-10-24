<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.navbar')
   
    <div class="container mt-5">
        @yield('content')
    </div>
    <footer>
        <p>&copy; {{ date('Y') }} Laundry Service. All rights reserved.</p>
    </footer>
</body>
</html>
