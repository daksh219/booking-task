<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <!-- You can add CSS here -->
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input, select, button { margin: 5px 0; padding: 8px; width: 200px; }
        button { cursor: pointer; }
    </style>
</head>
<body>
    <header>
        <h1>Booking System Dashboard</h1>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; {{ date('Y') }} Booking System</p>
    </footer>
</body>
</html>
